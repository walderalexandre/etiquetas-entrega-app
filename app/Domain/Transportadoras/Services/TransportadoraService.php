<?php

namespace App\Domain\Transportadoras\Services;

use App\Domain\Transportadoras\Repositories\TransportadoraRepositoryInterface;
use App\Domain\Transportadoras\Models\Transportadora;

class TransportadoraService implements TransportadoraServiceInterface
{
    public function __construct(
        private TransportadoraRepositoryInterface $repository
    ) {}

    public function obterTodasTransportadoras(): array
    {
        return $this->repository->obterTodas();
    }

    public function obterTransportadoraPorId(string $id): ?Transportadora
    {
        return $this->repository->obterPorId($id);
    }

    public function criarTransportadora(array $dados): Transportadora
    {
        if ($this->repository->obterPorEmail($dados['email'])) {
            throw new \DomainException('Já existe uma transportadora com este e-mail');
        }

        return $this->repository->criar($dados);
    }

    public function atualizarTransportadora(string $id, array $dados): Transportadora
    {
        if (!$this->repository->atualizar($id, $dados)) {
            throw new \DomainException('Falha ao atualizar transportadora');
        }

        return $this->repository->obterPorId($id);
    }

    public function deletarTransportadora(string $id): void
    {
        if (!$this->repository->deletar($id)) {
            throw new \DomainException('Falha ao deletar transportadora');
        }
    }
}
