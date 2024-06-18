<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models;

class TablaDinamica extends Component
{
    public $objetos = null;
    public $objetoClass = null;

    #[On('update_table')]
    public function update(){

        return view($objetoClass.'s.index');

    }

    public function render()
    {
        return view('livewire.tabla-dinamica');
    }

    public function delete($objrtoAborrar)
    {
        $this->objetoABorrar::class::destroy($this->objetoABorrar->id);
        $this->dispatch('update_table');

    }
}
