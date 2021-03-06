<?php

namespace App\Http\Controllers;

use App\Rendezvous;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreRdv;
use Auth;
class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        if (Auth::guard('user')->check()) {   
            $user = Auth::guard('user')->user();
            $rdvs = Rendezvous::where('id_user',$user->id)->paginate(10);
            return view('rendez-vous.index', compact('rdvs'));
    
        }
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rendez-vous.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRdv $request)
    {
        $medecin = Auth::guard('medecin')->user();
        $validated = $request->validated();
         //converts an array to JSON string
        $rdv = new Rendezvous([
            'id_user'=>$request->get('id_patient'),
            'id_medecin'=>$medecin->id,
            'remarque'=>$request->get('remarque'),
            'montant'=>'2000',
            'motif'=>json_encode($request->get('motifs')),
            'etat_payment'=>false,//$request->get('etat_payment'),
            'date_rdv'=>$request->get('date_rdv'),
            'status'=>'en attente',
            'creneau'=>$request->get('crenau')
        ]);
        $rdv->save();
        //$rdv->motifs()->attach($request->get('motifs'));

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
