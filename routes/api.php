<?php

use Illuminate\Support\Facades\Route;

Route::apiResources([
    'vendedores' => \App\Domain\Vendedores\Controllers\VendedorController::class,
    'transportadoras' => \App\Domain\Transportadoras\Controllers\TransportadoraController::class,
    'pedidos' => \App\Domain\Pedidos\Controllers\PedidoController::class,
    'etiquetas' => \App\Domain\Etiquetas\Controllers\EtiquetaController::class,
]);
