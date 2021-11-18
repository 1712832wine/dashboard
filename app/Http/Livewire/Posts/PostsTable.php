<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;

class PostsTable extends LivewireDatatable
{
    public $model = Post::class;
    public $exportable=true;
    public $complex = true;

    public function openForm($id){
        $this->emit();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->searchable()
                ->filterable()
                ->sortBy('id'),

            Column::name('title')
                ->label('Title')
                ->searchable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('components.actions-button', ['id'=>$id]);
            })->label('Action'),  

        ];
    }
}
