<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;
use App\Rendezvous;
use Auth;
use Mail;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        
        /**
         * here we gonna make a call , if cookies exist here insert an delte them  . . .
         */

        if(Cookie::has('inserted') == 'false'){
            $id_medecin=request()->cookie('id_medecin');
            $date=request()->cookie('date');
            $crenau=request()->cookie('crenau');
            $motif=request()->cookie('motif');    
            $user = Auth::user();
            $id_patient = $user->id;        

                $rdv = new Rendezvous([
                    'id_user'=>$user->id,
                    'id_medecin'=>$id_medecin,
                    'remarque'=>'null',//set this to null in db $data['remarque'],
                    'montant'=>'2000',
                    'motif'=>$motif,
                    'etat_payment'=>false,//$etat_payment,
                    'date_rdv'=>$date,
                    'status'=>'en attente',
                    'creneau'=>$crenau
                ]);
                $rdv->save();
                \Cookie::queue('inserted','true',20);
                /**
                 * after insert with cookies delte them 
                 */
                $medecin = "Haider";
                $to_email = "salhiali197@yahoo.fr";
                $body = "rendez-vous le ".$date." à ".$crenau." chez le Medecin Dr ".$medecin;
                $data = array("body" => $body);
                \Mail::send("emails.mail", $data, function($message) use ($to_email) {
                    $message->to($to_email)
                    ->subject("Tebibe : Rappel sur la prise de rendez-vous");
                        $message->from("salhihaider197@gmail.com",'Tebibe Mail Service');
                });                               
                        
                 $success = "inserterd ";
                 return redirect()->route('rendezvous.index')->with('success', 'le rendez-vosu a été enregostré avec succée -_-! '); 



        }
        return view('home');
    }



    /**
     * Search for medecins .
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        /*
        * la méthode de recherche
        */
        //$medecins =Medecin::where(['specialite' => $request->get('specialite'),'wilaya' => $request->get('wilaya')])->get();
        $medecins= ['12','4'];
        return view('results',compact(
            'medecins'
        ));
    }



}
