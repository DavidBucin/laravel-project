<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = ['make', 'model', 'concessionnaire_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function concessionnaire()
    {
        return $this->belongsTo(Concessionnaire::class);
    }
}
