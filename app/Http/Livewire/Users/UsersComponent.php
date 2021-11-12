<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersComponent extends Component
{
    public $user_id, $isOpen = false;
    public User $user;
    public $password = '';
    public $password_confirmation = '';
    protected $listeners = ['openForm'];

    // -----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'user.name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
            'password' => ['required', 'string','confirmed'],
            'password_confirmation' => []
        ];
    }
    // End validate
    // -----------------------------------------

    
    public function submit(){
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        return redirect()->route('users')->with('success', 'User Created Successfully!');
    }

    public function openForm($id = null){
        $this->user_id = $id;
        $this->user = User::firstOrNew(['id' => $id]);
        $this->isOpen = true;
    }

    public function resetData(){
        $this->user_id = null;
        $this->user = null;
        $this->password = '';
        $this->password_confirmation = '';
    }


    public function closeForm(){
        $this->resetData();
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.users.users-component');
    }
}
