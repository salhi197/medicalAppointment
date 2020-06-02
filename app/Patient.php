<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $guard = 'patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'prenom', 'nom', 'email', 'password','age','sexe','telephone','email_verified','phone_verified','code_verified','email_code','phone_code'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRdv($id_rdv)
    {   
        $rdv= Rendezvous::where('id',$id_rdv)->first();
        return $rdv->id_user == $this->id;

    }
}
