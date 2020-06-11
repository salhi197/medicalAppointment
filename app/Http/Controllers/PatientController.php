<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Facades\Hash;
use Auth;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:patient');
    }

    public function verifier(Request $request)
    {
        if ($request->isMethod('post')){
            $email = request()->cookie('email');
            $patient = Patient::where('email',$email)->first();
         
            $phone_code = $request['phone_code'];
            if($patient->phone_code == $phone_code){
                \Cookie::queue('id_verified','true',15);
                /**
                 * upadte patient status
                 */
                return redirect()->back()->with('success', 'le code  correcte ');   
            }else{
                return redirect()->back()->with('errors', 'le code est incorecte ');   
            }
        
        }else{
            $email = request()->cookie('email');  

            return view('auth.passwords.reset');
        
        }

    }

    public function deleteAccount()
    {
        $patient = Auth::guard('patient')->user();

        try {
            $patient->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('errors', $e);               
        }
        return redirect()->route('welcome')->with('success', 'le rendez-vous a été mis à jour ');

    }

    public function password(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view('patient.change-password');
        }
        else
        {
            if (!(Hash::check($request->get('current-password'), Auth::guard('patient')->user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","votre mot de passe ne convient pas à celui existant.");
            }
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","vous n'avez pas effectué un changement.");
            }
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:6',
            ]);

            $user = Auth::guard('patient')->user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
            return redirect()->back()->with("success","le mot de pass a été changé!");
    
    
        }

    }

    public function profile(Request $request)
    {
        $patient = Auth::guard('patient')->user();

        if ($request->isMethod('get'))
        {
            return view('patient.patient-profile',compact('patient'));
        }
        else
        {

            $patient->nom  = $request['nom'];
            $patient->prenom  =$request['prenom'];
            $patient->group_sang  =$request['group_sang'];
            $patient->date_naissance = $request['date_naissance'];
            $patient->telephone  = $request['telephone'];
            $patient->adress  = $request['adress'];
            $patient->email  = $request['email'];
            if ($request->hasFile('profile_img')) {
                $avatar = $request->file('profile_img');
                $filename = $patient->nom.'-'.$patient->prenom . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));
                $avatarPath = '/uploads/avatars/'.$filename;
                $patient->avatar = $avatarPath;
        
            }

            try {
    
                $patient->save();
              
              } catch (\Exception $e) {
                return redirect()->route('patient.rendezvous.index')->with('error', $e);
            }
              return redirect()->route('patient.rendezvous.index')->with('success', 'le rendez-vous a été mis à jour ');
            
        }

    }
}
