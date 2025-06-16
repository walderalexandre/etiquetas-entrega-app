<?php

namespace App\Domain\Vendedores\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';
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
