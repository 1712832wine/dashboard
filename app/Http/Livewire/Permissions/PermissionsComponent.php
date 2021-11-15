<?php

namespace App\Http\Livewire\Permissions;

use Spatie\Permission\Models\Permission;
use Livewire\Component;

class PermissionsComponent extends Component
{
    public $permission_id, $isOpen = false;
    public Permission $permission;
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // -----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'permission.name' => ['required', 'string', 'max:255'],
        ];
    }
    // End validate
    // -----------------------------------------

    // -----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        $this->permission->save();
        return redirect()->route('permissions')->with('success', 'Permissions Created Successfully!');
    }

    public function openForm($id = null){
        $this->permission_id = $id;
        $this->permission = Permission::firstOrNew(['id' => $id]);
        $this->isOpen = true;
    }

    public function resetData(){
        $this->permission_id = null;
        $this->permission = null;
    }

    public function closeForm(){
        $this->resetData();
        $this->isOpen = false;
    }
    // End form processing
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
        Permission::findOrFail($id)->delete();
        return redirect()->route('permissions')->with('success', 'Permission Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        return view('livewire.permissions.permissions-component');
    }
}
