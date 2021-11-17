<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoriesComponent extends Component
{
    public $category_id, $isOpen = false;
    public Category $category;
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // -----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'category.name' => ['required', 'string', 'max:255'],
            'category.slug' => [],
            'category.parent' => []
        ];
    }
    // End validate
    // -----------------------------------------

    // -----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        if ($this->category->slug == '') {
            $this->category->slug = Str::slug($this->category->name,'-');
        }
        $this->category->save();
        return redirect()->route('categories')->with('success', 'Category Created Successfully!');
    }

    public function openForm($id = null){
        $this->category_id = $id;
        $this->category = Category::firstOrNew(['id' => $id]);
        $this->isOpen = true;
    }

    public function resetData(){
        $this->category_id = null;
        $this->category = null;
    }

    public function closeForm(){
        $this->resetData();
        $this->isOpen = false;
    }
    // End form processing
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
            'callback'    => '',
        ]);
    }

    public function delete($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('categories')->with('success', 'Category Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        $list_category = Category::all();
        return view('livewire.categories.categories-component',['list_category' => $list_category]);
    }
}
