<?php

namespace App\Http\Controllers;

use App\Rendezvous;
use Illuminate\Http\Request;
use App\User;
use App\Soin;
use App\Creneau;
use App\Medecin;

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
            $medecin = Auth::guard('medecin')->user();
            $rdvs = Rendezvous::where('id_medecin',$medecin->id)->paginate(10);
            return view('rendez-vous.index', compact('rdvs'));
    
        }
        
        if (Auth::user()!= null) {   
            $user = Auth::user();
            $rdvs = Rendezvous::where('id_user',$user->id)->paginate(10);
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


        if (Auth::guard('medecin')->check()) {   
            $medecin = Auth::guard('medecin')->user();
            $rdvs = Rendezvous::where('id_medecin',$medecin->id)->paginate(10);
            return view('rendez-vous.index', compact('rdvs'));
    
        }
            $user = Auth::user();
            $medecin = Medecin::find($id_medecin);
            if($medecin->type_creneaux == "false"){
                $crenaux = Creneau::where('id_medecin',$id_medecin)->get();

            }else{
                /**
                 * ecart 
                 */

                 $crenaux = [
                    ['id' => 1, 'debut' => "08:00:00", "fin" =>"09:00:00"],
                    ['id' => 2, 'debut' => "09:00:00", "fin" =>"10:00:00"],
                    ['id' => 3, 'debut' => "10:00:00", "fin" =>"11:00:00"],
                    ['id' => 4, 'debut' => "11:00:00", "fin" =>"12:00:00"],
                    ['id' => 5, 'debut' => "12:00:00", "fin" =>"13:00:00"],
                    ['id' => 6, 'debut' => "13:00:00", "fin" =>"14:00:00"],                    
                ];                

            }
            $journees = Journee::where(['id_medecin'=>$id_medecin,'disponible'=>1])->get();
            $soins =Soin::where('id_medecin',$id_medecin)->get(); 

            return view('patient.rendez-vous.create',compact('soins','crenaux','journees'));


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
            $motif = $request['motif'];            
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
            'id_user'=>$id_patient,
            'id_medecin'=>$id_medecin,
            'remarque'=>'null',//set this to null in db $request->get('remarque'),
            'montant'=>'2000',
            'motif'=>$request->get('motif'),
            'etat_payment'=>false,//$request->get('etat_payment'),
            'date_rdv'=>$request->get('date'),
            'status'=>'en attente',
            'creneau'=>$request->get('crenau')
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function edit($id_rendezvous)
    {


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
        

        $rdv->id_user = $request['id_patient'];
        $rdv->motif = json_encode($request->get('motifs'));
        $rdv->remarque = $request['remarque'];
        $rdv->montant = '2000';
        $rdv->etat_payment = true;//$request['etat_payment'];
        $rdv->date_rdv = $request['date_rdv'];
        $rdv->creneau = $request['creneau'];
        $rdv->save();
        return redirect()->route('rendezvous.index')->with('success', 'l\'offre a été modifié!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rendezvous $rendezvous)
    {
        //
    }

    /**
     * Annuler un rdv , changer les status du rdv Remove the specified resource from storage.
     *
     * @param  \App\Rendezvous  $rendezvous
     * @return \Illuminate\Http\Response
     */
    public function annuler(Rendezvous $rendezvous)
    {
        //
    }


}
