<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['ISBN', 'nombreLibro', 'nombreEditorial', 'existenciaPrestamo', 'descripcion', 'categoria','rutaImagen'];
    public $timestamps = false;

    public function prestamos()
    {
        return $this->belongsTo(Prestamo::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class);
    }
}


