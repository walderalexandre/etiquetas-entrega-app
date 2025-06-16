<?php

namespace App\Domain\Etiquetas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Etiqueta extends Model
{
    use HasFactory;

    protected $table = 'etiquetas_entrega';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'vendedor_id',
        'transportadora_id',
        'pedido_id',
        'data_envio',
        'codigo_rastreio'
    ];

    protected $casts = [
        'id' => 'string',
        'vendedor_id' => 'string',
        'transportadora_id' => 'string',
        'pedido_id' => 'string',
        'data_envio' => 'date'
    ];

    public function vendedor()
    {
        return $this->belongsTo(\App\Domain\Vendedores\Models\Vendedor::class);
    }

    public function transportadora()
    {
        return $this->belongsTo(\App\Domain\Transportadoras\Models\Transportadora::class);
    }

    public function pedido()
    {
        return $this->belongsTo(\App\Domain\Pedidos\Models\Pedido::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
