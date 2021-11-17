<?php

namespace App\Http\Livewire\Tags;

use App\Models\Tag;
use Livewire\Component;
use Illuminate\Support\Str;

class TagsComponent extends Component
{
    public $tag_id, $isOpen = false;
    public Tag $tag;
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // -----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'tag.name' => ['required', 'string', 'max:255'],
            'tag.slug' => []
        ];
    }
    // End validate
    // -----------------------------------------

    // -----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        if ($this->tag->slug == '') {
            $this->tag->slug = Str::slug($this->tag->name,'-');
        }
        $this->tag->save();
        return redirect()->route('tags')->with('success', 'Tag Created Successfully!');
    }

    public function openForm($id = null){
        $this->tag_id = $id;
        $this->tag = Tag::firstOrNew(['id' => $id]);
        $this->isOpen = true;
    }

    public function resetData(){
        $this->tag_id = null;
        $this->tag = null;
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
        Tag::findOrFail($id)->delete();
        return redirect()->route('tags')->with('success', 'Tag Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        return view('livewire.tags.tags-component');
    }
}
