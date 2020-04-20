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

    public function __construct()
    {

        $this->middleware('auth:medecin');
    }
    


    public function index()
    {

        $creneaus=(DB::select("select * from creneaus where id_medecin = 1 order by debut asc"));

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

         Auth::id();



        DB::insert("insert into creneaus (debut,fin,max_visite,id_medecin) values(\"$request->debut\",\"$request->fin\",\"$request->max\",1) ");        

        session()->flash("notification.message" , "créneau \"$request->debut\",\"$request->fin\" ajouté avec succés");

        session()->flash('notification.type' , 'success'); 

        return back();


        # code...
    }


    public function ajouterplusieurscreneau(Request $request)
    {
        
        $data = $request->data;

        $first = ($data[0]['value']);
        
        $last = ($data[1]['value']);
        
        $dureee = ($data[2]['value']);
        
        $maximum = ($data[3]['value']);
        
        $var = "+" .(float)$dureee." minutes";

        if($maximum == null) {$maximum=1;}

        if ($first!=null && $last!=null && $dureee!=null) 
        {
            # code...
            DB::delete("delete from creneaus where id_medecin = 1");

            $new_creneaus=[];
            $i=0;

            while ( date('H:i',strtotime($var ,strtotime($first))) <= $last) 
            {
                
                $interm_last = date('H:i',strtotime($var ,strtotime($first)));

                $new_creneaus[$i]= (object)array('debut' => $first , 'fin' => $interm_last);                
                $i++;                

                DB::insert("insert into creneaus (debut,fin,max_visite,id_medecin) values(\"$first\",\"$interm_last\",\"$maximum\",1) ");        

                $first=$interm_last;

                # code...
            }

            return response()->json($new_creneaus);       

        }
        # code...
    }


    /**/
}
