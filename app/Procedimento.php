<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'data',
        'procedimento',
        'hora',
    ];
}
