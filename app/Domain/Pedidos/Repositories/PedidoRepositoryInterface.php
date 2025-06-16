<?php

namespace App\Domain\Pedidos\Repositories;

use App\Domain\Pedidos\Models\Pedido;

interface PedidoRepositoryInterface
{
    public function obterTodos(): array;
    public function obterPorId(string $id): ?Pedido;
    public function criar(array $dados): Pedido;
    public function atualizar(string $id, array $dados): bool;
    public function deletar(string $id): bool;
    public function obterPorVendedor(string $vendedorId): array;
}
