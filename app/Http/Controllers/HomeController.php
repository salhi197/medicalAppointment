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

        if ($_GET['specialite'] != '')
        { $filter[] = 'specialite = '.$_GET['specialite'];}
        if ($_GET['vertical'] != '')
        { $filter[] = 'VERTICAL = '.$_GET['vertical'];}
        if ($_GET['creative'] != '')
        { $filter[] = 'CREATIVE  = '.$_GET['creative'];}
        if ($_GET['week'] != '')
        { $filter[] = 'WK = '.$_GET['week'];}
        
        $query = 'SELECT * FROM $tableName WHERE '.implode(' AND ', $filter);
        $result = mysql_query($query);


        return view('results');
        // ,compact(
        //     'results'
        // ));
    }



}
