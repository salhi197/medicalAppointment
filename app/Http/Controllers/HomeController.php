<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;
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
        $medecins =Medecin::where(['specialite' => $request->get('specialite'),'wilaya' => $request->get('wilaya')])->get();
        return view('results',compact(
            'medecins'
        ));
    }



}
