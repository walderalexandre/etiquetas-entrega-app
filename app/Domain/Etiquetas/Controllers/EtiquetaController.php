<?php

namespace App\Domain\Etiquetas\Controllers;

use App\Domain\Etiquetas\Services\EtiquetaServiceInterface;
use App\Domain\Etiquetas\Requests\EtiquetaFormRequest;
use Illuminate\Http\JsonResponse;

class EtiquetaController
{
    public function __construct(
        private EtiquetaServiceInterface $etiquetaService
    ) {}

    public function index(): JsonResponse
    {
        $etiquetas = $this->etiquetaService->obterTodasEtiquetas();
        return response()->json($etiquetas);
    }

    public function store(EtiquetaFormRequest $request): JsonResponse
    {
        $etiqueta = $this->etiquetaService->criarEtiqueta($request->validated());
        return response()->json($etiqueta, 201);
    }

    public function show(string $id): JsonResponse
    {
        $etiqueta = $this->etiquetaService->obterEtiquetaPorId($id);
        return response()->json($etiqueta);
    }

    public function update(EtiquetaFormRequest $request, string $id): JsonResponse
    {
        $etiqueta = $this->etiquetaService->atualizarEtiqueta($id, $request->validated());
        return response()->json($etiqueta);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->etiquetaService->deletarEtiqueta($id);
        return response()->json(null, 204);
    }
}
