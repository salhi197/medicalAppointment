<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Rendezvous;
use Illuminate\Http\Request;
use App\User;
use App\Soin;
use App\Creneau;
use App\Medecin;
use Mail;
use App\Journee;

use App\Http\Requests\StoreRdv;
use Auth;
class PatientRendezvousController extends Controller
{

    public function __construct()
    {
    
    }

    public function index(Request $request)
    {
            $patient = Auth::guard('patient')->user();
            $rdvs = Rendezvous::where('id_user',$patient->id)->get();
            return view('patient.rendez-vous.index', compact('rdvs'));
    }



    public function create(Request $request,$id_medecin)
    {
        /**
         * à changer 
         */
        $creneaus_dimanche = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=0 order by j.id,cr.debut"));
        
        $creneaus_lundi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=1 order by j.id,cr.debut"));
            
        $creneaus_mardi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=2 order by j.id,cr.debut"));
            
        $creneaus_mercredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=3 order by j.id,cr.debut"));
            
        $creneaus_jeudi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=4 order by j.id,cr.debut"));
            
        $creneaus_vendredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=5 order by j.id,cr.debut"));
            
        $creneaus_samedi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=6 order by j.id,cr.debut"));
            
        $journees_creneaus=[$creneaus_dimanche,$creneaus_lundi,$creneaus_mardi,$creneaus_mercredi,$creneaus_jeudi,$creneaus_vendredi,$creneaus_samedi];

        $patient = Auth::guard('patient')->user();
        $medecin = Medecin::find($id_medecin);
        $soins =Soin::where('id_medecin',$id_medecin)->get(); 

        return view('patient.rendez-vous.create',compact('soins','journees_creneaus'));
    }

    public function store(Request $request)
    {
        
        $patient = Auth::guard('patient')->user();

        if($patient == null){
            $id_medecin = 1;//$request['id_medecin'];
            $date = $request['date'];
            $crenau = $request['crenau'];
            $fin_crenau = $request['fin_crenau'];
            $motif = $request['motif'];  
            $autre_nom = $request['nom'];
            $autre_prenom = $request['prenom'];
            
            /**
             * set cookies 
             */
            \Cookie::queue('id_medecin',$id_medecin,15);
            \Cookie::queue('date',$date,15);
            \Cookie::queue('crenau',$crenau,15);
            \Cookie::queue('fin_crenau',$fin_crenau,15);
            \Cookie::queue('motif',$motif,15);
            \Cookie::queue('nom',$autre_nom,15);
            \Cookie::queue('prenom',$autre_prenom,15);
            \Cookie::queue('inserted','false',15);              
            return view('patient.LoginRegister',compact('id_medecin','date','crenau','motif'));
        }

        $id_medecin = 1;//$request['id_medecin'];
        //$validated = $request->validated();
         //converts an array to JSON string
        $rdv = new Rendezvous([
            'id_user'=>$patient->id,
            'id_medecin'=>$id_medecin,
            'remarque'=>'null',//set this to null in db $request->get('remarque'),
            'montant'=>'2000',
            'motif'=>$request->get('motif'),
            'etat_payment'=>false,//$request->get('etat_payment'),
            'date_rdv'=>$request->get('date'),
            'status'=>'en attente',
            'creneau'=>$request->get('crenau'),
            'fin_crenau'=>$request->get('fin_crenau'),
            'nom'=>'null',
            'prennom'=>'null',
            
        ]);
        $rdv->save();
        //$rdv->motifs()->attach($request->get('motifs'));
        return redirect()->route('patient.rendezvous.index')->with('success', 'le rendez-vosu a été enregostré avec succée -_- ');

    } 

    public function destroy($id_rendezvous)
    {
        $patient = Auth::guard('patient')->user();
        $rdv = Rendezvous::where('id', $id_rendezvous)->first();
        if($patient->hasRdv($rdv->id)){
            $rdv->delete();
        }else{
            /**
             * le rendez-vous machi ta3o , my9dche ysuprimih
             */
            return abort(404);
        }

    }

    
}