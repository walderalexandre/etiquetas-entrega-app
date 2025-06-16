<?php

namespace App\Domain\Etiquetas\Repositories;

use App\Domain\Etiquetas\Models\Etiqueta;
use Illuminate\Support\Str;

class EloquentEtiquetaRepository implements EtiquetaRepositoryInterface
{
    public function obterTodas(): array
    {
        return Etiqueta::with(['vendedor', 'transportadora', 'pedido'])
            ->get()
            ->toArray();
    }

    public function obterPorId(string $id): ?Etiqueta
    {
        return Etiqueta::with(['vendedor', 'transportadora', 'pedido'])
            ->find($id);
    }

    public function criar(array $dados): Etiqueta
    {
        return Etiqueta::create($dados);
    }

    public function atualizar(string $id, array $dados): bool
    {
        return Etiqueta::where('id', $id)->update($dados) > 0;
    }

    public function deletar(string $id): bool
    {
        return Etiqueta::destroy($id) > 0;
    }
}
