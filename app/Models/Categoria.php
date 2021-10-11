<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $guarded = [];


    public function blog()
    {
        return $this->hasOne(Blog::class, 'categoria_id');
    }
}
