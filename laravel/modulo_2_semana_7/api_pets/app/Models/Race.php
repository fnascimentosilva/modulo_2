<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    //nao mostrar o id o banco de dados
    /* protected $hidden = ['id']; */
}
