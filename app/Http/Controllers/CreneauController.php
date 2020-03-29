<?php

namespace App\Http\Controllers;

use App\Creneau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

class CreneauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $creneaus=(DB::select("select * from creneaus order by debut asc"));

        return view('medecin.creneaus',compact('creneaus'));

        # code...
    }

    public function modifiercreneau(Request $request)    
    {

        if ($request->ajax()) 
        {            
            

            $id = $request->id;
            $debut = $request->debut;
            $fin = $request->fin;
            $limite = $request->limite;

        
            (DB::update("update creneaus set debut=\"$debut\",fin=\"$fin\",max_visite=\"$limite\" where id=\"$id\" and id_medecin=1 "));

            $creneau=DB::select("select * from creneaus where id = \"$id\"")[0];

            return response()->json($creneau);        

            # code...
        }


        # code...
    }

    public function supprimercreneau($id)
    {

        DB::delete("delete from creneaus where id=\"$id\"");

        session()->flash("notification.message" , "suppression du créneau éffectuée avec succés");

        session()->flash('notification.type' , 'warning'); 

        return back();


        # code...
    }

    public function ajoutercreneau(Request $request)
    {
        $this->validate($request,[
        'debut' => 'unique:creneaus',
        'fin' => 'unique:creneaus',
        'max' => 'int|max:100|min:1'
        ]);

        

        DB::insert("insert into creneaus (debut,fin,max_visite,id_medecin) values(\"$request->debut\",\"$request->fin\",\"$request->max\",1) ");        

        session()->flash("notification.message" , "créneau \"$request->debut\",\"$request->fin\" ajouté avec succés");

        session()->flash('notification.type' , 'success'); 

        return back();


        # code...
    }




    /**/
}
