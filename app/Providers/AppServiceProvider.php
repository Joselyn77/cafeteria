<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Livewire\ProductosComponent;
use App\Http\Livewire\CategoriasComponent;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // En app/Providers/AppServiceProvider.php



    public function boot()
    {
        Livewire::component('productos-component', ProductosComponent::class);
        Livewire::component('categorias-component', CategoriasComponent::class);
    }

}
