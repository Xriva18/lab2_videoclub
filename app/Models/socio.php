<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socio extends Model
{
    use HasFactory;
    protected $table = 'socios'; // Nombre de la tabla
    protected $primaryKey = 'soc_id'; // Clave primaria personalizada
    public $incrementing = true; // Indica si la clave primaria se incrementa automáticamente
    protected $keyType = 'int'; // Tipo de la clave primaria
    protected $fillable = [
        'soc_cedula', // Campos rellenables
        'soc_nombre', // Campos rellenables
        'soc_direcion', // Campos rellenables
        'soc_telefono', // Campos rellenables
        'soc_correo', // Campos rellenables
    ];
}
