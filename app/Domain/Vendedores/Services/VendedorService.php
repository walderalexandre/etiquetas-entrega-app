<?php

namespace App\Domain\Vendedores\Services;

use App\Domain\Vendedores\Repositories\VendedorRepositoryInterface;
use App\Domain\Vendedores\Models\Vendedor;

class VendedorService implements VendedorServiceInterface
{
    public function __construct(
        private VendedorRepositoryInterface $repository
    ) {}

    public function obterTodosVendedores(): array
    {
        return $this->repository->obterTodos();
    }

    public function obterVendedorPorId(string $id): ?Vendedor
    {
        return $this->repository->obterPorId($id);
    }

    public function criarVendedor(array $dados): Vendedor
    {
        if ($this->repository->obterPorEmail($dados['email'])) {
            throw new \DomainException('Já existe um vendedor com este e-mail');
        }

        return $this->repository->criar($dados);
    }

    public function atualizarVendedor(string $id, array $dados): Vendedor
    {
        if (!$this->repository->atualizar($id, $dados)) {
            throw new \DomainException('Falha ao atualizar vendedor');
        }

        return $this->repository->obterPorId($id);
    }

    public function deletarVendedor(string $id): void
    {
        if (!$this->repository->deletar($id)) {
            throw new \DomainException('Falha ao deletar vendedor');
        }
    }
}
