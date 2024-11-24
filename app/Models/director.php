<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class director extends Model
{
    use HasFactory;
    protected $table = 'directores';
    protected $primaryKey = 'dir_id';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'dir_nombre',
    ];
}
