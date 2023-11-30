<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concessionnaire extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'content'];

    // relation entre user et concessionnaire
    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    */

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }


    // relation entre category et concessionnaire

    //relation entre concessionnaire et comments


    // recuperation des commentaires valides

    public function validComments()
    {
        return $this->comments()->whereHas('user', function ($query) {
            $query->whereValid(true);
        });
    }


}
