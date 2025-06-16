<?php

namespace App\Domain\Pedidos\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'vendedor_id',
        'produto',
        'quantidade',
        'valor_total'
    ];

    protected $casts = [
        'id' => 'string',
        'vendedor_id' => 'string',
        'quantidade' => 'integer',
        'valor_total' => 'decimal:2'
    ];

    public function vendedor()
    {
        return $this->belongsTo(\App\Domain\Vendedores\Models\Vendedor::class);
    }
}
