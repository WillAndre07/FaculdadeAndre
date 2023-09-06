<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filmes extends Model
{
    public $timestamps = false;

    protected $table = 'filmes';
    
    protected $fillable = ['id','Titulo'];
}
