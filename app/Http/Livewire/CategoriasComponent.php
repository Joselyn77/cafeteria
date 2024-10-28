<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CategoriasComponent extends Component
{
    public $categorias;

    public function mount()
    {
        $this->loadCategorias();
    }

    public function loadCategorias()
    {
        $this->categorias = Categoria::all(); // Carga las categorías desde la base de datos
    }

    public function render()
    {
        return view('livewire.categorias-component'); // Asegúrate de que este sea el nombre correcto
    }
}
