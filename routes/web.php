<?php
use Illuminate\Http\Request;
use App\Medecin;

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('login.writer');
Route::get('/login/medecin', 'Auth\LoginController@showMedecinLoginForm')->name('login.medecin');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer');
Route::get('/register/medecin', 'Auth\RegisterController@showMedecinRegisterForm')->name('register.medecin');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');
Route::post('/login/medecin', 'Auth\LoginController@medecinLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');
Route::post('/register/medecin', 'Auth\RegisterController@createMedecin')->name('register.medecin');

Route::get('/home', 'HomeController@index')->middleware('auth');
Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:writer'], function () {
    Route::view('/writer', 'writer');
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