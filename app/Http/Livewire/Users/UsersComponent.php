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
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

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

    // -----------------------------------------
    // Form processing
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
    // End form process
    // ----------------------------------------

    // ----------------------------------------
    // Confirm Alert
    
    // End confirm alert
    // -------------------------------------------

    // ----------------------------------------
    // Confirm Alert
    public function confirmDelete($id){
        // return dd("fdd");
        $this->emit('swal:confirm', [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You won't be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'delete',
            'params'      => $id,
            'callback'    => '',
        ]);
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted Successfully!');
    }
    // End confirm alert
    // -------------------------------------------

    public function render()
    {
        return view('livewire.users.users-component');
    }
}
