<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    //altera o nome da tabela buscada pelo modelo
    protected $table = 'pets';

    //comando que mostra os campos editaveis
    protected $fillable = ['name', 'weight', 'size', 'age'];
}
