<?php

namespace App\Domain\Etiquetas\Services;

use App\Domain\Etiquetas\Models\Etiqueta;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface EtiquetaServiceInterface
{
    public function obterTodasEtiquetas(): array;
    public function obterEtiquetaPorId(string $id): ?Etiqueta;
    public function criarEtiqueta(array $dados): Etiqueta;
    public function atualizarEtiqueta(string $id, array $dados): Etiqueta;
    public function deletarEtiqueta(string $id): void;
}
