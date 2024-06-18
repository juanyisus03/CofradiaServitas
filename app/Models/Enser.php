<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enser extends Model
{
    use HasFactory;

    public function paso()
    {
        return $this->belongsTo(Paso::class);
    }

}
