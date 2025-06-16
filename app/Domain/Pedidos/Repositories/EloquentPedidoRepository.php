<?php

namespace App\Domain\Pedidos\Repositories;

use App\Domain\Pedidos\Models\Pedido;

class EloquentPedidoRepository implements PedidoRepositoryInterface
{
    public function obterTodos(): array
    {
        return Pedido::with('vendedor')->get()->toArray();
    }

    public function obterPorId(string $id): ?Pedido
    {
        return Pedido::with('vendedor')->find($id);
    }

    public function criar(array $dados): Pedido
    {
        return Pedido::create($dados);
    }

    public function atualizar(string $id, array $dados): bool
    {
        return Pedido::where('id', $id)->update($dados) > 0;
    }

    public function deletar(string $id): bool
    {
        return Pedido::destroy($id) > 0;
    }

    public function obterPorVendedor(string $vendedorId): array
    {
        return Pedido::where('vendedor_id', $vendedorId)
            ->with('vendedor')
            ->get()
            ->toArray();
    }
}
