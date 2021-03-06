<?php
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

Route::view('/home', 'home')->middleware('auth');
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
 * les routes pour rendez-vous
 */
Route::group(['prefix' => 'rendezvous', 'as' => 'rendezvous'], function () {
    Route::get('/', ['as' => '.index', 'uses' => 'RendezvousController@index']);
    Route::post('/create', ['as' => '.create', 'uses' => 'RendezvousController@store']);
    Route::get('/show/create',['as'=>'.show.create', 'uses' => 'RendezvousController@create']);
    Route::get('/delete/{id_rdv}', ['as' => '.delete', 'uses' => 'RendezvousController@destroy']);
    Route::post('/update/{id_rdv}', ['as' => '.update', 'uses' => 'RendezvousController@update']);
    Route::get('/show/update/{id_rdv}', ['as' => '.show', 'uses' => 'RendezvousController@show']);
    Route::get('/annuler/{id_rdv}', ['as' => '.annuler', 'uses' => 'RendezvousController@annuler']);
    
});