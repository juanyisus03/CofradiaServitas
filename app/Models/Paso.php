<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trono;

class Paso extends Model
{
    use HasFactory;

    public function tronos()
    {
        return $this->hasMany(Trono::class);
    }

    public function ensers()
    {
        return $this->hasMany(Trono::class);
    }

}
