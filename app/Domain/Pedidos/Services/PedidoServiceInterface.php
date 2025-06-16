<?php

namespace App\Domain\Pedidos\Services;

use App\Domain\Pedidos\Models\Pedido;

interface PedidoServiceInterface
{
    public function obterTodosPedidos(): array;
    public function obterPedidoPorId(string $id): ?Pedido;
    public function criarPedido(array $dados): Pedido;
    public function atualizarPedido(string $id, array $dados): Pedido;
    public function deletarPedido(string $id): void;
    public function obterPedidosPorVendedor(string $vendedorId): array;
}
