<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PostsTable extends LivewireDatatable
{
    public $model = Post::class;
    public $exportable = true;
    public $complex = true;


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
                return view('components.btn.btn-actions', ['id' => $id]);
            })->label('Action'),

        ];
    }
}
