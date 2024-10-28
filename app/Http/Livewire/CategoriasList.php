<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CategoriasList extends Component
{
    public $categorias;

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        return view('livewire.categorias-list');
    }
}
