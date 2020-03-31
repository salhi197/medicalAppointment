<?php

namespace App\Http\Controllers;

use App\Soin;
use App\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class SoinController extends Controller
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

        $soins=(DB::select("select * from soins order by id"));

        $last_id = array_last($soins)->id;
        
        return view('medecin.soins',compact('soins','last_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */


    public function modifiersoins(Request $request)
    {

        $id = Auth::id();

        $actuel=Medecin::findOrFail($id); 


        if ($request->ajax()) 
        {

            (DB::update("update soins c set c.nom=\"$request->nom\",c.description=\"$request->description\" where (c.id=$request->id) "));

            return response()->json();
        }
        
        # code...
    }

    public function supprimersoins(Request $request)
    {

        $id = Auth::id();

        $actuel=Medecin::findOrFail($id); 

        if ($request->ajax()) 
        {

            DB::delete("delete from soins where id=\"$request->id\"");

            return response()->json();

            # code...
        }

        # code...
    }

    public function ajoutersoins(Request $request)
    {

        $id = Auth::id();

        $actuel=Medecin::findOrFail($id); 


        if ($request->ajax()) 
        {
    
            DB::insert("insert into soins (nom,description,id_medecin) values(\"$request->nom\",\"$request->description\",$id) ");        

            return response()->json();

            # code...
        }



        # code...
    }



    /**/    
}
