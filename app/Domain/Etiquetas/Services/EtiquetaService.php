<?php

namespace App\Domain\Etiquetas\Services;

use App\Domain\Etiquetas\Repositories\EtiquetaRepositoryInterface;
use App\Domain\Etiquetas\Models\Etiqueta;
use App\Domain\Vendedores\Services\VendedorServiceInterface;
use App\Domain\Transportadoras\Services\TransportadoraServiceInterface;
use App\Domain\Pedidos\Services\PedidoServiceInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EtiquetaService implements EtiquetaServiceInterface
{
    public function __construct(
        private EtiquetaRepositoryInterface $etiquetaRepository,
        private VendedorServiceInterface $vendedorService,
        private TransportadoraServiceInterface $transportadoraService,
        private PedidoServiceInterface $pedidoService,
    ) {}

    public function obterTodasEtiquetas(): array
    {
        return $this->etiquetaRepository->obterTodas();
    }

    public function obterEtiquetaPorId(string $id): ?Etiqueta
    {
        return $this->etiquetaRepository->obterPorId($id);
    }

    public function criarEtiqueta(array $dados): Etiqueta
    {
        $this->validarRelacionamentos($dados);
        
        return $this->etiquetaRepository->criar($dados);
    }

    public function atualizarEtiqueta(string $id, array $dados): Etiqueta
    {
        $this->validarRelacionamentos($dados);
        
        if (!$this->etiquetaRepository->atualizar($id, $dados)) {
            throw new \DomainException('Falha ao atualizar etiqueta');
        }

        return $this->etiquetaRepository->obterPorId($id);
    }

    public function deletarEtiqueta(string $id): void
    {
        if (!$this->etiquetaRepository->deletar($id)) {
            throw new \DomainException('Falha ao deletar etiqueta');
        }
    }

    private function validarRelacionamentos(array $dados): void
    {
        if (!$this->vendedorService->obterVendedorPorId($dados['vendedor_id'])) {
            throw new \DomainException('Vendedor não encontrado');
        }

        if (!$this->transportadoraService->obterTransportadoraPorId($dados['transportadora_id'])) {
            throw new \DomainException('Transportadora não encontrada');
        }

        if (!$this->pedidoService->obterPedidoPorId($dados['pedido_id'])) {
            throw new \DomainException('Pedido não encontrado');
        }
    }
}
