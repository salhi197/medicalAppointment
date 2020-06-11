<?php
use Illuminate\Http\Request;
use App\Medecin;
use App\Patient;

Route::view('/', 'welcome')->name('welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/patient', 'Auth\LoginController@showPatientLoginForm')->name('login.patient');
Route::get('/login/medecin', 'Auth\LoginController@showMedecinLoginForm')->name('login.medecin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/patient', 'Auth\RegisterController@showPatientRegisterForm')->name('register.patient');
Route::get('/register/medecin', 'Auth\RegisterController@showMedecinRegisterForm')->name('register.medecin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/patient', 'Auth\LoginController@patientLogin');
Route::post('/login/medecin', 'Auth\LoginController@medecinLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/patient', 'Auth\RegisterController@createPatient')->name('register.patient');
Route::post('/register/medecin', 'Auth\RegisterController@createMedecin')->name('register.medecin');

Route::get('/home', 'HomeController@index')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:patient'], function () {
    Route::view('/patient', 'patient');
});
Route::group(['middleware' => 'auth:medecin'], function () {
    Route::view('/medecin', 'medecin');
    Route::get('medecin/appointments', 'MedecinController@showMedecinRegisterForm')->name('register.medecin');


    Route::get('medecin/appointments', function()    {
        return view('medecin');
    });

    Route::get('/medecin/appointments/create', function()
    {
        return view('medecin.appointments');
    })->name('appointment-create');
    
});

/**
 * cette partie est trés importante , puisque c le crud de medecin et il se fait au niveau d'admin 
 */
Route::group(['prefix' => 'medecin', 'as' => 'medecin'], function () {

    Route::get('/', ['as' => '.index', 'uses' => 'MedecinController@index']);
    
    Route::get('/profile/{id_medecin}', ['as' => '.profile', 'uses' => 'MedecinController@show']);
    Route::get('/profile-settings','MedecinController@profile')->name('medecin.profile.settings');

    
    Route::post('/create', ['as' => '.create', 'uses' => 'MedecinController@store']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'MedecinController@create']);
    Route::get('/delete/{id_rdv}', ['as' => '.delete', 'uses' => 'MedecinController@destroy']);
    Route::post('/update/{id_rdv}', ['as' => '.update', 'uses' => 'MedecinController@update']);
    Route::get('/show/{id_rdv}', ['as' => '.show', 'uses' => 'MedecinController@show']);
    
});




/**
 * les routes pour rendez-vous
 */
Route::group(['prefix' => 'rendezvous', 'as' => 'rendezvous'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'RendezvousController@index']);
    Route::post('/create', ['as' => '.create', 'uses' => 'RendezvousController@store']);
    Route::get('/show/create/medecin/{id_medecin}',['as'=>'.show.create.patient', 'uses' => 'RendezvousController@create']);
    Route::get('/show/create',['as'=>'.show.create.medecin', 'uses' => 'RendezvousController@create']);
    Route::get('/delete/{id_rdv}', ['as' => '.delete', 'uses' => 'RendezvousController@destroy']);
    Route::post('/update/{id_rdv}', ['as' => '.update', 'uses' => 'RendezvousController@update']);
    Route::get('/show/update/{id_rdv}', ['as' => '.show', 'uses' => 'RendezvousController@edit']);
    Route::get('/annuler/{id_rdv}', ['as' => '.annuler', 'uses' => 'RendezvousController@annuler']);
    Route::get('/destroy/{id_rdv}', ['as' => '.destroy', 'uses' => 'RendezvousController@destroy']);
    
});

/**
 * les routes pour les soins (motifs)
 */

Route::get('/medecin/soins','SoinController@index');
Route::post('/medecin/soins/ajouter/ajax', 'SoinController@ajoutersoins');
Route::post('/medecin/soins/modifier/ajax', 'SoinController@modifiersoins');
Route::post('/medecin/soins/supprimer/ajax', 'SoinController@supprimersoins');


/**
 * les routes pour les créneaux
*/

Route::get('/medecin/creneaus','CreneauController@index');
Route::post('/medecin/modifiercreneau/ajax','CreneauController@modifiercreneau');
Route::get('/medecin/creneaus/supprimer/{id}','CreneauController@supprimercreneau');
Route::post('/medecin/creneaus/ajouter', 'CreneauController@ajoutercreneau');
Route::post('/medecin/add_many/ajax', 'CreneauController@ajouterplusieurscreneau');


/**
 * les routes pour les journées
*/


Route::get('/medecin/journées','JourneeController@index');
Route::post('/medecin/journées/modifier/post/ajax','JourneeController@modifierjour2');



/**
* les routes liées à la recherche . . . 
*/

Route::get('/search/medecins','HomeController@search')->name('search.medecins');
Route::get('/reservation','HomeController@search')->name('search.medecins');


/**
 * des routes sans controllers .. code driectemtnt
 */
Route::post('/changer/etat/crenau',function(Request $request){
    if($request->ajax()){
        $medecin = Auth::guard('medecin')->user();
        Medecin::where('id', $medecin->id)->update(['type_creneaux' => $request['etat']]);
        return response()->json(['message'=>'done .. ']);
    }
})->name('changer_etat_crenau');

Route::get('/test',function(){
    return view('patient.LoginRegister',compact());
});



/**
 * patient routes 
 * 
 */
Route::get('verify','PatientController@verifier')->name('verify.get');
Route::post('verify','PatientController@verifier')->name('verify.post');

Route::post('delete/account','PatientController@deleteAccount')->name('delete-account');
Route::get('patient/mot-de-passe','PatientController@password')->name('password.get');
Route::post('patient/mot-de-passe','PatientController@password')->name('password.post');
Route::get('patient/profile','PatientController@profile')->name('profile.get');
Route::post('patient/profile','PatientController@profile')->name('profile.post');

Route::group(['prefix' => 'patient/rendezvous', 'as' => 'patient.rendezvous'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'PatientRendezvousController@index']);
    Route::get('/show/create/medecin/{id_medecin}',['as'=>'.show.create', 'uses' => 'PatientRendezvousController@create']);
    Route::post('/create', ['as' => '.create', 'uses' => 'PatientRendezvousController@store']);
    Route::get('/destroy/{id_rdv}', ['as' => '.destroy', 'uses' => 'PatientRendezvousController@destroy']);    
    
    Route::get('/modifier/{id_rdv}', ['as' => '.edit', 'uses' => 'PatientRendezvousController@edit']);
    Route::post('/modifier/{id_rdv}', ['as' => '.update', 'uses' => 'PatientRendezvousController@update']);
    // Route::get('/annuler/{id_rdv}', ['as' => '.annuler', 'uses' => 'PatientRendezvousController@annuler']);
    
});







/**
 * profile settings 
 */

Route::get('/medecin/profile-settings','MedecinController@profile')->name('medecin.profile.settings');
 


