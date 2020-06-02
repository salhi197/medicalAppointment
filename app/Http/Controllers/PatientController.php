<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Cookie;

class PatientController extends Controller
{
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
                return redirect()->back()->with('success', 'le code  incorecte ');   
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
        /**
         * toute une histoire
         */
        dd('test');
    }
}
