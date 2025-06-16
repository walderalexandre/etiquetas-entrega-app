<?php

namespace App\Domain\Vendedores\Repositories;

use App\Domain\Vendedores\Models\Vendedor;

class EloquentVendedorRepository implements VendedorRepositoryInterface
{
    public function obterTodos(): array
    {
        return Vendedor::all()->toArray();
    }

    public function obterPorId(string $id): ?Vendedor
    {
        return Vendedor::find($id);
    }

    public function criar(array $dados): Vendedor
    {
        return Vendedor::create($dados);
    }

    public function atualizar(string $id, array $dados): bool
    {
        return Vendedor::where('id', $id)->update($dados) > 0;
    }

    public function deletar(string $id): bool
    {
        return Vendedor::destroy($id) > 0;
    }

    public function obterPorEmail(string $email): ?Vendedor
    {
        return Vendedor::where('email', $email)->first();
    }
}
