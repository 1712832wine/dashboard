<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersComponent extends Component
{
    public $user_id, $isOpen = false;
    public User $user;
    public $password = '', $password_confirmation = '';
    public $roles = [];
    public $disabled = [];
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // ----------------------------------------
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
    // ----------------------------------------

    // ----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        if ($this->user_id) {
            // edit
            $this->user->password = $this->password;
        } else {
            // create
            $this->user->password = Hash::make($this->password);
        }
        $this->user->syncRoles($this->roles);
        $this->user->save();
        return redirect()->route('users')->with('success', 'User Created Successfully!');
    }

    public function openForm($id = null){
        $this->user_id = $id;
        $this->user = User::firstOrNew(['id' => $id]);
        $this->roles = $this->user->roles->pluck('name');
        if ($id) {
            // open edit form
            $this->disabled = ['name','email','password','password_confirmation'];
            $this->password = $this->user->password;
            $this->password_confirmation = $this->user->password;
        }
        $this->isOpen = true;
    }

    public function resetData(){
        $this->user_id = null;
        $this->user = null;
        $this->password = '';
        $this->password_confirmation = '';
        $this->roles = [];
        $this->disabled = [];
    }

    public function closeForm(){
        $this->resetData();
        $this->isOpen = false;
    }
    // End form process
    // ----------------------------------------

    // ----------------------------------------
    // Confirm Alert
    public function confirmDelete($id){
        $this->emit('swal:confirm', [
            'type'        => 'warning',
            'title'       => 'Are you sure?',
            'text'        => "You will not be able to revert this!",
            'confirmText' => 'Yes, delete!',
            'method'      => 'delete',
            'params'      => $id,
            'callback'    => ''
        ]);
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        $list_roles = Role::all()->pluck('name');
        return view('livewire.users.users-component',[
            'list_roles' => $list_roles
        ]);
    }
}
