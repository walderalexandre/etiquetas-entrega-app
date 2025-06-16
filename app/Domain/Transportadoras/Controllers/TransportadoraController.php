<?php

namespace App\Domain\Transportadoras\Controllers;

use App\Domain\Transportadoras\Services\TransportadoraServiceInterface;
use App\Domain\Transportadoras\Requests\TransportadoraFormRequest;
use Illuminate\Http\JsonResponse;

class TransportadoraController
{
    public function __construct(
        private TransportadoraServiceInterface $transportadoraService
    ) {}

    public function index(): JsonResponse
    {
        $transportadoras = $this->transportadoraService->obterTodasTransportadoras();
        return response()->json($transportadoras);
    }

    public function store(TransportadoraFormRequest $request): JsonResponse
    {
        $transportadora = $this->transportadoraService->criarTransportadora($request->validated());
        return response()->json($transportadora, 201);
    }

    public function show(string $id): JsonResponse
    {
        $transportadora = $this->transportadoraService->obterTransportadoraPorId($id);
        return response()->json($transportadora);
    }

    public function update(TransportadoraFormRequest $request, string $id): JsonResponse
    {
        $transportadora = $this->transportadoraService->atualizarTransportadora($id, $request->validated());
        return response()->json($transportadora);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->transportadoraService->deletarTransportadora($id);
        return response()->json(null, 204);
    }
}
