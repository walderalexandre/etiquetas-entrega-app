<?php

namespace App\Domain\Transportadoras\Repositories;

use App\Domain\Transportadoras\Models\Transportadora;

interface TransportadoraRepositoryInterface
{
    public function obterTodas(): array;
    public function obterPorId(string $id): ?Transportadora;
    public function criar(array $dados): Transportadora;
    public function atualizar(string $id, array $dados): bool;
    public function deletar(string $id): bool;
    public function obterPorEmail(string $email): ?Transportadora;
}
