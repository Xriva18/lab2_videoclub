<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alquiler extends Model
{
    use HasFactory;
    protected $table = 'alquileres';
    protected $primaryKey = 'alq_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'soc_id',
        'pel_id',
        'alq_fec_desde',
        'alq_fec_hasta',
        'alq_valor',
        'alq_fec_entrega',
    ];
    public function socio()
    {
        return $this->belongsTo(socio::class, 'soc_id', 'soc_id');
    }
    public function pelicula()
    {
        return $this->belongsTo(pelicula::class, 'pel_id', 'pel_id');
    }
}
