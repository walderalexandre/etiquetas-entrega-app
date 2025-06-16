<?php

namespace App\Domain\Vendedores\Services;

use App\Domain\Vendedores\Models\Vendedor;

interface VendedorServiceInterface
{
    public function obterTodosVendedores(): array;
    public function obterVendedorPorId(string $id): ?Vendedor;
    public function criarVendedor(array $dados): Vendedor;
    public function atualizarVendedor(string $id, array $dados): Vendedor;
    public function deletarVendedor(string $id): void;
}
