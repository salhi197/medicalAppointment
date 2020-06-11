<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Medecin;
use App\User;
class Rendezvous extends Model
{
    protected $fillable = [
        'patient_id',
        'id_medecin',
        'motif',
        'remarque',
        'montant',
        'etat_payment',
        'date_rdv',
        'creneau',
        'status',
        'fin_crenau',
        'nom','prennom'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function medecin()
    {
        return $this->belongsTo('App\Medecin');
    }

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
            'patient_id'=>$id_patient,
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

    /**
     * get medecin info based on id 
     */
    public function getMedecin()
    {
        return Medecin::where('id',$this->id_medecin)->first();        
    } 
    
    /**
     * get patient info based on id 
     */
    public function getPatient()
    {
        return User::where('id',$this->patient_id)->first();        
    } 
    
}

