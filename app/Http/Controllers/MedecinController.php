<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;
class MedecinController extends Controller
{
    
    public function __construct()
    {

        //$this->middleware('auth:medecin');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function show($id_medecin)
    {   
        $medecin = Medecin::where('id',$id_medecin)->first();
        return view('medecin.profile',compact('medecin'));
    }

    /**
     * profile settings.
     *
     * @param  \App\Medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {   
        return view('medecin.profile-settings');
    }
    

}
