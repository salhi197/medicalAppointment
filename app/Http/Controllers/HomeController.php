<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medecin;
use App\Rendezvous;
use Auth;
use Mail;
use User;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * here we gonna make a call , if cookies exist here insert an delte them  . . .
         */

        return view('home');
    }

    /**
     *  Search for medecins .
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        /*
        * la méthode de recherche
        */  
        // $results = Medecin::where('wilyaya', '=', $request['wilaya'])
        // ->where('specilaite', '=', $request['specialite'])
        // ->get();

        $filter = array();

        if ($request->get('specialite') != '')
        { $filter[] = 'specialite=\''.$request->get('specialite').'\'';}
        if ($request->get('sexe') != '')
        { $filter[] = 'sexe=\''.$request->get('sexe').'\'';}
        if ($request->get('wilaya') != '')
        { $filter[] = 'wilaya=\''.$request->get('wilaya').'\'';}
        if ($request->get('min_age') != '')
        { $filter[] = 'age > '.$request->get('min_age');}
        if ($request->get('max_age') != '')
        { $filter[] = 'age < '.$request->get('max_age');}
        
        $query = 'SELECT * FROM medecins WHERE '.implode(' AND ', $filter);
//        $result = mysql_query($query);
        return view('results',compact('query'));

    }



}
