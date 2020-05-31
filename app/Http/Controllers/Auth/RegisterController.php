<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Patient;
use App\Medecin;
use App\Rendezvous;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:patient');
        $this->middleware('guest:medecin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPatientRegisterForm()
    {
        return view('auth.patient.register', ['url' => 'patient']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMedecinRegisterForm()
    {
        return view('auth.register', ['url' => 'medecin']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createPatient(Request $request)
    {
        //$this->validator($request->all())->validate();

        $phone_code  = $this->generateBarcodeNumber('phone_code');

        $email_code  = $this->generateBarcodeNumber('email_code');

            /**
             * send email and sms here 
             */
        $email  = $request['email'];
        Patient::create([
            'prenom'=>$request['prenom'],
            'nom'=>$request['nom'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'age'=>$request['age'],
            'sexe'=>$request['sexe'],
            'telephone'=>$request['telephone'],
            'email_verified'=>0,
            'phone_verified'=>0,
            'email_code'=>$phone_code,
            'phone_code'=>$email_code,
            'password' => Hash::make($request['password']),
        ]);
        $request->session()->flash('email', $email);
        \Cookie::queue('email',$email,15);
        \Cookie::queue('id_verified','false',15);
 
        return redirect()->to('verify');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createMedecin(Request $request)
    {
        $this->validator($request->all())->validate();
        Medecin::create([
            'nom' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('login/medecin');
    }

    function generateBarcodeNumber($attr) {
        $number = mt_rand(100000,999999 ); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number,$attr)) {
            return generateBarcodeNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    function barcodeNumberExists($number,$attr) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Patient::where($attr,$number)->exists();
    }




}
