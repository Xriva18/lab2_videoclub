<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelicula extends Model
{
    use HasFactory;
    protected $table = 'peliculas';

    protected $primaryKey = 'pel_id';

    public $incrementing = true;

    protected $keyType = 'int';
    
    protected $fillable = [
        'gen_id',
        'dir_id',
        'for_id',
        'pel_nombre',
        'pel_costo',
        'pel_fec_estreno',
    ];

    public function genero()
    {
        return $this->belongsTo(genero::class, 'gen_id', 'gen_id');
    }

    public function director()
    {
        return $this->belongsTo(director::class, 'dir_id', 'dir_id');
    }

    public function formato()
    {
        return $this->belongsTo(formato::class, 'for_id', 'for_id');
    }
}
