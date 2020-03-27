<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $fillable = [
        'id_user',
        'id_medecin',
        'motif',
        'remarque',
        'montant',
        'etat_payment',
        'date_rdv',
        'creneau',
        'status'
    ];


    public function Motif()
    {
        return $this->belongsToMany('App\Motif');
    }

}
