<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Medecin extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $guard = 'medecin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nom', 'email', 'password','prenom','date_naissance','age','sexe','email','email_verified_at','password','telephone','objet','specilaite','adresse','langitude','latitude','commune','wilyaya','presentation','etat_payment','etat_compte'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
