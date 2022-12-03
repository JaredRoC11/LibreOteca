<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $fillable = ['nombre', 'rutaFoto'];
    public $timestamps = false;

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }
}


