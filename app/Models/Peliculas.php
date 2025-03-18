<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;
 protected $fillable=['titulo','duracion','genero_id','clasificacion_id','anio','ruta','youtube_enlace','descripcion'];
 
 public function genero()
    {
        return $this->belongsTo(Generos::class);
    }

    public function clasificacion()
    {
        return $this->belongsTo(Clasificaciones::class);
    }
}
