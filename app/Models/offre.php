<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'num_vol',
        'nom_compagnie',
        'airport_depart',
        'airport_arrive',
        'jour_depart',
        'jour_arrive',
        'maxquantite',
        'tarif_kg',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }



    public function reservation()
    {
        return $this->hasMany(reservation::class,'offre_id');
    }
}


