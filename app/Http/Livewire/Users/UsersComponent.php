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
    public $roles = [], $permissions = [], $permissions_in_roles = [];
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];
     // ----------------------------------------
    // Updated
    protected function updatedRoles()
    {
        // this function has not ferfected;
        $this->permissions_in_roles = [];
        foreach ($this->roles as $role_name)
        {
            $role = Role::where('name',$role_name)->first();
            $permissions_in_role = $role->permissions->pluck('name');
            $this->permissions_in_roles = array_unique(array_merge($this->permissions_in_roles,json_decode($permissions_in_role)));
        }
        $this->permissions = $this->permissions_in_roles;
    }
    // End updated
    // ----------------------------------------

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
        $this->user->password = Hash::make($this->password);
        $this->user->syncPermissions($this->permissions);
        $this->user->syncRoles($this->roles);
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
        $list_permissions = Permission::all()->pluck('name');
        $list_roles = Role::all()->pluck('name');
        return view('livewire.users.users-component',[
            'list_permissions' => $list_permissions,
            'list_roles' => $list_roles
        ]);
    }
}
