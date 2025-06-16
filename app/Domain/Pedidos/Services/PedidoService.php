<?php

namespace App\Domain\Pedidos\Services;

use App\Domain\Pedidos\Repositories\PedidoRepositoryInterface;
use App\Domain\Vendedores\Services\VendedorServiceInterface;
use App\Domain\Pedidos\Models\Pedido;

class PedidoService implements PedidoServiceInterface
{
    public function __construct(
        private PedidoRepositoryInterface $pedidoRepository,
        private VendedorServiceInterface $vendedorService
    ) {}

    public function obterTodosPedidos(): array
    {
        return $this->pedidoRepository->obterTodos();
    }

    public function obterPedidoPorId(string $id): ?Pedido
    {
        return $this->pedidoRepository->obterPorId($id);
    }

    public function criarPedido(array $dados): Pedido
    {
        // Verifica se o vendedor existe
        if (!$this->vendedorService->obterVendedorPorId($dados['vendedor_id'])) {
            throw new \DomainException('Vendedor não encontrado');
        }

        return $this->pedidoRepository->criar($dados);
    }

    public function atualizarPedido(string $id, array $dados): Pedido
    {
        if (isset($dados['vendedor_id']) && 
            !$this->vendedorService->obterVendedorPorId($dados['vendedor_id'])) {
            throw new \DomainException('Vendedor não encontrado');
        }

        if (!$this->pedidoRepository->atualizar($id, $dados)) {
            throw new \DomainException('Falha ao atualizar pedido');
        }

        return $this->pedidoRepository->obterPorId($id);
    }

    public function deletarPedido(string $id): void
    {
        if (!$this->pedidoRepository->deletar($id)) {
            throw new \DomainException('Falha ao deletar pedido');
        }
    }

    public function obterPedidosPorVendedor(string $vendedorId): array
    {
        if (!$this->vendedorService->obterVendedorPorId($vendedorId)) {
            throw new \DomainException('Vendedor não encontrado');
        }

        return $this->pedidoRepository->obterPorVendedor($vendedorId);
    }
}
