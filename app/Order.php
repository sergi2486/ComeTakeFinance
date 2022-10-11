<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'montant', 
        'solde_a_rembourser',
        'delai_remboursement',
        'nombre_versement',
        'bien_garanti',
        'valeur_bien_garanti',
        'activite',
        'contrat_bail',
        'recu_impot',
        'facture_bien',
        'photo_entiere',
        'photo_cni',
        'photo_bien', 
        'photo_business'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
