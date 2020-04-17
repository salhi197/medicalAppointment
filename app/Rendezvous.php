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

    /**
     * create finction for rendez-vous model  
     */
    public function createRendezvous($id_patient,$id_medecin,$motif,$date,$crenau)
    {
        $rdv = new Rendezvous([
            'id_user'=>$id_patient,
            'id_medecin'=>$id_medecin,
            'remarque'=>'null',
            'montant'=>'2000',
            'motif'=>$request->get('motif'),
            'etat_payment'=>false,
            'date_rdv'=>$request->get('date'),
            'status'=>'en attente',
            'creneau'=>$request->get('crenau')
        ]);
        $rdv->save();
        return $rdv;
    }

}
