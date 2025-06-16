<?php

namespace App\Domain\Transportadoras\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportadora extends Model
{
    use HasFactory;

    protected $table = 'transportadoras';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nome',
        'endereco',
        'email',
        'telefone'
    ];

    protected $casts = [
        'id' => 'string'
    ];
}
