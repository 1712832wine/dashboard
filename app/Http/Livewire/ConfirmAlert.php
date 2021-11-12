<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmAlert extends Component
{
    protected $listeners = ['confirmDelete' => 'confirmDelete'];
    public function confirmDelete($id){
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Success!!',
            'text'  => "This is a success message",
        ]);
    }
    public function render()
    {
        return view('livewire.confirm-alert');
    }
}
