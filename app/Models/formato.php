<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formato extends Model
{
    use HasFactory;
    protected $table = 'formatos'; // Nombre de la tabla
    protected $primaryKey = 'for_id'; // Clave primaria personalizada
    public $incrementing = true; // Indica si la clave primaria se incrementa automáticamente
    protected $keyType = 'int'; // Tipo de la clave primaria

    protected $fillable = [
        'for_nombre', 
    ];
}
