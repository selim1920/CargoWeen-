<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'Service',
        'id_Transitaire',
        'name',
        'quantite',
        'longueur',
        'largeur',
        'hauteur',
        'poids',
        'type',
        'nature',
        'stockage',
        'etat',
        'poids_total',
        'poids_taxable',
        'prix_total',
        'code',
        'type_code',
        'id_offre',

    ];

    public function Transitaire()
    {
        return $this->belongsTo(User::class, 'id_Transitaire');
    }
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }


}
