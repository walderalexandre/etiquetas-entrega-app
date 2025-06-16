<?php

namespace App\Domain\Etiquetas\Repositories;

use App\Domain\Etiquetas\Models\Etiqueta;

interface EtiquetaRepositoryInterface
{
    public function obterTodas(): array;
    public function obterPorId(string $id): ?Etiqueta;
    public function criar(array $dados): Etiqueta;
    public function atualizar(string $id, array $dados): bool;
    public function deletar(string $id): bool;
    public function gerarCodigoRastreio(): string;
}
