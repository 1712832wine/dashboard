<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class PostsComponent extends Component
{
    public $post_id, $isOpen = false;
    public Post $post;
    protected $listeners = ['openForm', 'confirmDelete', 'delete'];

    // -----------------------------------------
    // Validate
    protected function rules()
    {
        return [
            'post.title' => ['required', 'string', 'max:255'],
            'post.slug' => []
        ];
    }
    // End validate
    // -----------------------------------------

    // -----------------------------------------
    // Form processing
    public function submit(){
        $this->validate();
        if ($this->post->slug == '') {
            $this->post->slug = Str::slug($this->post->name,'-');
        }
        $this->post->save();
        return redirect()->route('posts')->with('success', 'Post Created Successfully!');
    }

    public function openForm($id = null){
        $this->post_id = $id;
        $this->post = Post::firstOrNew(['id' => $id]);
        $this->isOpen = true;
    }

    public function resetData(){
        $this->post_id = null;
        $this->post = null;
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
        Post::findOrFail($id)->delete();
        return redirect()->route('posts')->with('success', 'Post Deleted Successfully!');
    }
    // End confirm alert
    // ----------------------------------------

    public function render()
    {
        return view('livewire.posts.posts-component');
    }
}
