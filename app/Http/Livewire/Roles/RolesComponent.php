<?php

namespace App\Http\Livewire\Roles;

use Spatie\Permission\Models\Role;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class RolesComponent extends Component
{
    public $role_id, $isOpen = false;
    public Role $role;
    public $permissions;
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // ----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'role.name' => ['required', 'string', 'max:255'],
        ];
    }
    // End validate
    // ----------------------------------------

    // ----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        $this->role->syncPermissions($this->permissions);
        $this->role->save();
        return redirect()->route('roles')->with('success', 'Role Created Successfully!');
    }

    public function openForm($id = null){
        $this->role_id = $id;
        $this->role = Role::firstOrNew(['id' => $id]);
        $this->permissions = $this->role->permissions->pluck('name');
        $this->isOpen = true;
    }

    public function resetData(){
        $this->role_id = null;
        $this->role = null;
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
    // ----------------------------------------

    // ----------------------------------------
    // Confirm Alert
    public function confirmDelete($id){
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
        Role::findOrFail($id)->delete();
        return redirect()->route('roles')->with('success', 'Role Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        $list_permissions = Permission::all()->pluck('name');
        return view('livewire.roles.roles-component',['list_permissions' => $list_permissions]);
    }
}
