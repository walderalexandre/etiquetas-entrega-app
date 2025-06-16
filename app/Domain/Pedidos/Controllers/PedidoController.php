<?php

namespace App\Domain\Pedidos\Controllers;

use App\Domain\Pedidos\Services\PedidoServiceInterface;
use App\Domain\Pedidos\Requests\PedidoFormRequest;
use Illuminate\Http\JsonResponse;

class PedidoController
{
    public function __construct(
        private PedidoServiceInterface $pedidoService
    ) {}

    public function index(): JsonResponse
    {
        $pedidos = $this->pedidoService->obterTodosPedidos();
        return response()->json($pedidos);
    }

    public function store(PedidoFormRequest $request): JsonResponse
    {
        $pedido = $this->pedidoService->criarPedido($request->validated());
        return response()->json($pedido, 201);
    }

    public function show(string $id): JsonResponse
    {
        $pedido = $this->pedidoService->obterPedidoPorId($id);
        return response()->json($pedido);
    }

    public function update(PedidoFormRequest $request, string $id): JsonResponse
    {
        $pedido = $this->pedidoService->atualizarPedido($id, $request->validated());
        return response()->json($pedido);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->pedidoService->deletarPedido($id);
        return response()->json(null, 204);
    }

    public function porVendedor(string $vendedorId): JsonResponse
    {
        $pedidos = $this->pedidoService->obterPedidosPorVendedor($vendedorId);
        return response()->json($pedidos);
    }
}
