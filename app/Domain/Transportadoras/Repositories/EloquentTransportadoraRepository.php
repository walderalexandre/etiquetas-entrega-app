<?php

namespace App\Domain\Transportadoras\Repositories;

use App\Domain\Transportadoras\Models\Transportadora;

class EloquentTransportadoraRepository implements TransportadoraRepositoryInterface
{
    public function obterTodas(): array
    {
        return Transportadora::all()->toArray();
    }

    public function obterPorId(string $id): ?Transportadora
    {
        return Transportadora::find($id);
    }

    public function criar(array $dados): Transportadora
    {
        return Transportadora::create($dados);
    }

    public function atualizar(string $id, array $dados): bool
    {
        return Transportadora::where('id', $id)->update($dados) > 0;
    }

    public function deletar(string $id): bool
    {
        return Transportadora::destroy($id) > 0;
    }

    public function obterPorEmail(string $email): ?Transportadora
    {
        return Transportadora::where('email', $email)->first();
    }
}
