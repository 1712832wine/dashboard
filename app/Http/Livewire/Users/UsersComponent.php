<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class UsersComponent extends Component
{
    public $user_id, $isOpen = false;
    protected $listeners = ['openForm'];

    public function openForm($id){
        $this->user_id = $id;
        $this->isOpen = true;
    }

    public function render()
    {
        return view('livewire.users.users-component');
    }
}
