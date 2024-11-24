<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class papel extends Model
{
    use HasFactory;
    protected $table = 'papeles';
    protected $primaryKey = 'pap_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'act_id',
        'pel_id',
        'apl_papel',
    ];
    public function actor()
    {
        return $this->belongsTo(actor::class, 'act_id', 'act_id');
    }
    public function pelicula()
    {
        return $this->belongsTo(pelicula::class, 'pel_id', 'pel_id');
    }
}
