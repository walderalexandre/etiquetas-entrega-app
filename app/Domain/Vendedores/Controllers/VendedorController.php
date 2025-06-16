<?php

namespace App\Domain\Vendedores\Controllers;

use App\Domain\Vendedores\Services\VendedorServiceInterface;
use App\Domain\Vendedores\Requests\VendedorFormRequest;
use Illuminate\Http\JsonResponse;

class VendedorController
{
    public function __construct(
        private VendedorServiceInterface $vendedorService
    ) {}

    public function index(): JsonResponse
    {
        $vendedores = $this->vendedorService->obterTodosVendedores();
        return response()->json($vendedores);
    }

    public function store(VendedorFormRequest $request): JsonResponse
    {
        $vendedor = $this->vendedorService->criarVendedor($request->validated());
        return response()->json($vendedor, 201);
    }

    public function show(string $id): JsonResponse
    {
        $vendedor = $this->vendedorService->obterVendedorPorId($id);
        return response()->json($vendedor);
    }

    public function update(VendedorFormRequest $request, string $id): JsonResponse
    {
        $vendedor = $this->vendedorService->atualizarVendedor($id, $request->validated());
        return response()->json($vendedor);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->vendedorService->deletarVendedor($id);
        return response()->json(null, 204);
    }
}
