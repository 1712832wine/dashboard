<?php

namespace App\Http\Livewire\Tags;

use App\Models\Tag;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TagsTable extends LivewireDatatable
{
    public $model = Tag::class;
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

            Column::name('name')
                ->label('Name')
                ->searchable()
                ->filterable(),

            Column::name('slug')
                ->label('slug')
                ->searchable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('components.btn.btn-actions', ['id' => $id]);
            })->label('Action'),

        ];
    }
}
