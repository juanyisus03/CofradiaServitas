<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paso;


class Trono extends Model
{
    use HasFactory;

    public function paso()
    {
        return $this->belongsTo(Paso::class);
    }
}
