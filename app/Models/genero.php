<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;
    protected $table = 'generos'; // Nombre de la tabla

    protected $primaryKey = 'gen_id'; // Clave primaria personalizada

    public $incrementing = true; // Indica si la clave primaria se incrementa automáticamente

    protected $keyType = 'int'; // Tipo de la clave primaria

    protected $fillable = [
        'gen_nombre', // Campos rellenables
        ];
}
