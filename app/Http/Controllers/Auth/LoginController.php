<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Cookie;
use Illuminate\Support\Facades\Config;
use App\Patient;
use App\Rendezvous;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:patient')->except('logout');
        $this->middleware('guest:medecin')->except('logout');
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.admin')
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPatientLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.patient')
        ]);
    }

        /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMedecinLoginForm()
    {
        return view('auth.login', [
            'url' => 'medecin'
        ]);
    }

    /**
     * @param Request $request  
     * @return array
     */
    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    /**
     * @param Request $request
     * @param $guard
     * @return bool
     */
    protected function guardLogin(Request $request, $guard)
    {
        return  Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->get('remember')
        );
    }

    protected function guardLoginPatient(Request $request, $guard)
    {
        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
                'email_verified'=> 0,
                'phone_verified'=> 0                
            ],
            $request->get('remember')
        );
    }


    /**
     * 
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminLogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.admin'))) {
            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }



    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function patientLogin(Request $request)
    {
        $check =$this->guardLoginPatient($request,Config::get('constants.guards.patient'));


        if ($check==true) {
            if(Cookie::has('inserted') == 'false'){
                $id_medecin=request()->cookie('id_medecin');
                $date=request()->cookie('date');
                $crenau=request()->cookie('crenau');
                $fin_crenau=request()->cookie('fin_crenau');
                $motif=request()->cookie('motif');    
                $user = Patient::where('email',$request['email'])->first();
                $id_patient = $user->id;        
                    $rdv = new Rendezvous([
                        'id_user'=>$id_patient,
                        'id_medecin'=>$id_medecin,
                        'remarque'=>'null',//set this to null in db $data['remarque'],
                        'montant'=>'2000',
                        'motif'=>$motif,
                        'etat_payment'=>false,//$etat_payment,
                        'date_rdv'=>$date,
                        'status'=>'en attente',
                        'creneau'=>$crenau,
                        'nom'=>'test',
                        'prennom'=>'test',
                        'fin_crenau'=>$fin_crenau,                    
                    ]);
                    $rdv->save();
                    \Cookie::queue('inserted','true',20);
                    /**
                     * after
                     *  insert with cookies delte them 
                     */
                    $medecin = "Haider";
                    $to_email = "salhiali197@yahoo.fr";
                    $body = "rendez-vous le ".$date." à ".$crenau." chez le Medecin Dr ".$medecin;
                    $data = array("body" => $body);
                    \Mail::send("emails.mail", $data, function($message) use ($to_email) {
                        $message->to($to_email)
                        ->subject("Tebibe : Rappel sur la prise de rendez-vous");
                            $message->from("salhihaider197@gmail.com",'Tebibe Mail Service');
                    });                                                       
                     $success = "inserterd ";
            }
            return redirect()->intended('/patient/rendezvous');

        }

        return back()->withInput($request->only('email', 'remember'));
    }
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function medecinLogin(Request $request)
    {
        if ($this->guardLogin($request,'medecin')) {
            return redirect()->intended('/medecin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

}
