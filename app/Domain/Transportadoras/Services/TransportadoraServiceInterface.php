<?php

namespace App\Domain\Transportadoras\Services;

use App\Domain\Transportadoras\Models\Transportadora;

interface TransportadoraServiceInterface
{
    public function obterTodasTransportadoras(): array;
    public function obterTransportadoraPorId(string $id): ?Transportadora;
    public function criarTransportadora(array $dados): Transportadora;
    public function atualizarTransportadora(string $id, array $dados): Transportadora;
    public function deletarTransportadora(string $id): void;
}
