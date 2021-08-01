<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confronto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_casa','gols_casa','cv_casa','ca_casa','id_fora','gols_fora','cv_fora','ca_fora'
    ];
}
