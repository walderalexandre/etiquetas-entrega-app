<?php

namespace App\Domain\Vendedores\Repositories;

use App\Domain\Vendedores\Models\Vendedor;

interface VendedorRepositoryInterface
{
    public function obterTodos(): array;
    public function obterPorId(string $id): ?Vendedor;
    public function criar(array $dados): Vendedor;
    public function atualizar(string $id, array $dados): bool;
    public function deletar(string $id): bool;
    public function obterPorEmail(string $email): ?Vendedor;
}
