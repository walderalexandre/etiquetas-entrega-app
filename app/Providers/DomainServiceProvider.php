<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerVendedoresModule();
        $this->registerTransportadorasModule();
        $this->registerPedidosModule();
        $this->registerEtiquetasModule();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected function registerVendedoresModule(): void
    {
        $this->app->bind(
            \App\Domain\Vendedores\Repositories\VendedorRepositoryInterface::class,
            \App\Domain\Vendedores\Repositories\EloquentVendedorRepository::class
        );

        $this->app->bind(
            \App\Domain\Vendedores\Services\VendedorServiceInterface::class,
            \App\Domain\Vendedores\Services\VendedorService::class
        );
    }

    protected function registerTransportadorasModule(): void
    {
        $this->app->bind(
            \App\Domain\Transportadoras\Repositories\TransportadoraRepositoryInterface::class,
            \App\Domain\Transportadoras\Repositories\EloquentTransportadoraRepository::class
        );

        $this->app->bind(
            \App\Domain\Transportadoras\Services\TransportadoraServiceInterface::class,
            \App\Domain\Transportadoras\Services\TransportadoraService::class
        );
    }

    protected function registerPedidosModule(): void
    {
        $this->app->bind(
            \App\Domain\Pedidos\Repositories\PedidoRepositoryInterface::class,
            \App\Domain\Pedidos\Repositories\EloquentPedidoRepository::class
        );

        $this->app->bind(
            \App\Domain\Pedidos\Services\PedidoServiceInterface::class,
            \App\Domain\Pedidos\Services\PedidoService::class
        );
    }

    protected function registerEtiquetasModule(): void
    {
        $this->app->bind(
            \App\Domain\Etiquetas\Repositories\EtiquetaRepositoryInterface::class,
            \App\Domain\Etiquetas\Repositories\EloquentEtiquetaRepository::class
        );

        $this->app->bind(
            \App\Domain\Etiquetas\Services\EtiquetaServiceInterface::class,
            \App\Domain\Etiquetas\Services\EtiquetaService::class
        );
    }
}
