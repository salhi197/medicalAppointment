<?php

namespace App\Http\Controllers;

use App\Journee;
use App\Creneau;
use App\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;


class JourneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function __construct()
    {

        $this->middleware('auth:medecin');
    }


    public function index()
    {

        $id = Auth::id();

        $actuel=Medecin::findOrFail($id);         

        $journees=(DB::select("select * from journees where id_medecin=\"$id\" order by id"));

        $debuts=DB::select("select debut from creneaus where id_medecin=\"$id\" order by debut");

        $fins=DB::select("select fin from creneaus where id_medecin=\"$id\" order by fin");

        return view('medecin.journees',compact('journees','debuts','fins'));

        # code...
    }


    public function modifierjour2(Request $request)
    {            

        $id = Auth::id();

        $actuel=Medecin::findOrFail($id); 


        $this->validate($request,[
        'dispo' => 'max:1|int|min:0|required'
        ]);    

        dump($request->heuredeb);
        
        dump($request->heurefin);
                
        if ($request->heuredeb<$request->heurefin) 
        {
            
            (DB::update("update journees set disponible=\"$request->dispo\",heuredeb=\"$request->heuredeb\",heurefin=\"$request->heurefin\" where id=$request->id and id_medecin = $id"));

            # code...
        }

        return response()->json();

        # code...
    }



    /**/
}
