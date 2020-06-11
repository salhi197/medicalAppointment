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
class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }


    public function index(Request $request)
    {
        /**
         * get all appointements , filter by medecin id .. . .
         * ici on va essayer de récupérer les RDV d'un medecin , ainsi que le patient , donc 
         * on va faire un 'where' condition sur la table rdv .. bien la redecridtion va se diffaire . 
         */
        
        if (Auth::guard('medecin')->check()) {   
            $date = date('Y-m-d');
            $medecin = Auth::guard('medecin')->user();
            /**
             * rendez-vous d'auhourd'hui 
             */
            $upcoming_rdvs = Rendezvous::where(['id_medecin'=>$medecin->id,'status'=>''])
            ->orderBy('created_at', 'desc')
            ->get();
            /**
             * get upcoming appointements
             */
            $today_rdvs = Rendezvous::where(['id_medecin'=>$medecin->id,'date_rdv'=>$date])
            ->orderBy('created_at', 'desc')
            ->get();
            return view('rendez-vous.index', compact('today_rdvs','upcoming_rdvs'));

        }
        
        if (Auth::user()!= null) {   
            $user = Auth::user();
            $rdvs = Rendezvous::where('patient_id',$user->id)->paginate(10);
            return view('patient.rendez-vous.index', compact('rdvs'));
    
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_medecin)
    {

        $creneaus_dimanche = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=0 order by j.id,cr.debut"));
        
        $creneaus_lundi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=1 order by j.id,cr.debut"));
            
        $creneaus_mardi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=2 order by j.id,cr.debut"));
            
        $creneaus_mercredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=3 order by j.id,cr.debut"));
            
        $creneaus_jeudi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=4 order by j.id,cr.debut"));
            
        $creneaus_vendredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=5 order by j.id,cr.debut"));
            
        $creneaus_samedi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=6 order by j.id,cr.debut"));
            
        $journees_creneaus=[$creneaus_dimanche,$creneaus_lundi,$creneaus_mardi,$creneaus_mercredi,$creneaus_jeudi,$creneaus_vendredi,$creneaus_samedi];

        if (Auth::guard('medecin')->check()) {   
            $medecin = Auth::guard('medecin')->user();
            $rdvs = Rendezvous::where('id_medecin',$medecin->id)->paginate(10);
            return view('rendez-vous.index', compact('rdvs'));
    
        }
            $user = Auth::user();
            $medecin = Medecin::find($id_medecin);
            // if($medecin->type_creneaux == "false"){
            //     $crenaux = Creneau::where('id_medecin',$id_medecin)->get();
                

            // }else{
            //     /**
            //      * ecart 
            //      */

            //      $crenaux = [
            //         ['id' => 1, 'debut' => "08:00:00", "fin" =>"09:00:00"],
            //         ['id' => 2, 'debut' => "09:00:00", "fin" =>"10:00:00"],
            //         ['id' => 3, 'debut' => "10:00:00", "fin" =>"11:00:00"],
            //         ['id' => 4, 'debut' => "11:00:00", "fin" =>"12:00:00"],
            //         ['id' => 5, 'debut' => "12:00:00", "fin" =>"13:00:00"],
            //         ['id' => 6, 'debut' => "13:00:00", "fin" =>"14:00:00"],                    
            //     ];                

            // }

            //$journees = Journee::where(['id_medecin'=>$id_medecin,'disponible'=>1])->get();
            $soins =Soin::where('id_medecin',$id_medecin)->get(); 

            return view('patient.rendez-vous.create',compact('soins','journees_creneaus'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRdv $request)
    {
        if (Auth::guard('medecin')->check()) {   
            $id_medecin = Auth::guard('medecin')->user()->id;
            $id_patient = $request->get('id_patient');
        }
        if(Auth::user()== null){
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
        if (Auth::user()!= null) {   
            $user = Auth::user();
            $id_patient = $user->id;
            $id_medecin = 1;//$request['id_medecin'];
        }
        //$validated = $request->validated();
         //converts an array to JSON string
        $rdv = new Rendezvous([
            'patient_id'=>$id_patient,
            'id_medecin'=>$id_medecin,
            'remarque'=>'null',//set this to null in db $request->get('remarque'),
            'montant'=>'2000',
            'motif'=>$request->get('motif'),
            'etat_payment'=>false,//$request->get('etat_payment'),
            'date_rdv'=>$request->get('date'),
            'status'=>'en attente',
            'creneau'=>$request->get('crenau'),
            'fin_crenau'=>$request->get('fin_crenau'),
        ]);
        $rdv->save();
        //$rdv->motifs()->attach($request->get('motifs'));
            echo "done";
        return redirect()->route('rendezvous.index')->with('success', 'le rendez-vosu a été enregostré avec succée -_- ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function show($id_rendezvous)
    {   
        $rdv = Rendezvous::find($id_rendezvous);
        if ($rdv == null) {
            return view('error');
        }
        //dd($rdv);
        return view('rendez-vous.show', compact('rdv'));
    }

    /**
     * 
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rdv)
    {

        /**
         * modifer rendez-vous pour patient ,  si vous souhaitez créer une fonction modifier pour medecin ,créer une autre méthode
         */
        $rdv = Rendezvous::where('id',$id_rdv)->first();
        
        $id_medecin = $rdv->id_medecin;

        $creneaus_dimanche = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=0 order by j.id,cr.debut"));
        
        $creneaus_lundi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=1 order by j.id,cr.debut"));
            
        $creneaus_mardi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=2 order by j.id,cr.debut"));
            
        $creneaus_mercredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=3 order by j.id,cr.debut"));
            
        $creneaus_jeudi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=4 order by j.id,cr.debut"));
            
        $creneaus_vendredi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=5 order by j.id,cr.debut"));
            
        $creneaus_samedi = (DB::select("select j.id as id_jour,j.jour,cr.debut,cr.fin from journees j ,creneaus cr where cr.id_medecin=j.id_medecin and cr.id_medecin=\"$id_medecin\" and (cr.debut>=j.heuredeb and cr.debut<=j.heurefin) and j.disponible=1 and j.id=6 order by j.id,cr.debut"));            
        $journees_creneaus=[$creneaus_dimanche,$creneaus_lundi,$creneaus_mardi,$creneaus_mercredi,$creneaus_jeudi,$creneaus_vendredi,$creneaus_samedi];

        $soins =Soin::where('id_medecin',$id_medecin)->get(); 

        return view('patient.rendez-vous.edit',compact('rdv','soins','journees_creneaus'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rendezvous $rendezvous,$id_rdv)
    {
      // $request->validate([
        //     'numero_offre' => 'required',
        //     'titre_offre' => 'required',
        //     'nom_agence' => 'required',
        //     'date_offre' => 'required'
        // ]);
        $rdv = Rendezvous::find($id_rdv);
      
    
        $rdv->motif = $request->get('motifs');
        $rdv->date_rdv = $request['date'];
        $rdv->motif = $request['motif'];
        
        $rdv->creneau = $request['crenau'];
        $rdv->save();
        return redirect()->route('rendezvous.index')->with('success', 'le rendez-vous a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_rendezvous)
    {
        $rdv = Rendezvous::where('id', $id_rendezvous)->first();
        $rdv->delete();

    }

    

    /**
     * Annuler un rdv ,de la part de medecin changer les status du rdv .
     *
     */
    public function annuler(Rendezvous $rendezvous,$id_rendezvous)
    {
        $rdv = Rendezvous::where('id', $id_rendezvous)->first();
        $rdv->update(['status' => -1]);
        $user = User::where('id',$rdv->id_patient)->first();

        /**
         * sending emila
         */
        $medecin = "Haider";
        $to_email = "salhiali197@yahoo.fr";
        $body = "Nous vous informons que votre rendez-vous a été annulé";
        $data = array("body" => $body);
        $tempalte = "emails.mail";
        \Mail::send($tempalte, $data, function($message) use ($to_email) {
            $message->to($to_email)
            ->subject("Tebibe : Rappel sur la prise de rendez-vous");
                $message->from("salhihaider197@gmail.com",'Tebibe Mail Service');
        });                               

        return redirect()->route('rendezvous.index')->with('success', 'votre rendez-vous a été annulé .. !');
    }

    /**
     * Cloturer un rdv , veut dire que le rendez-vosu a été réaliser.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */

    public function cloturer($id_rendezvous)
    {


    }


}
