<?php

namespace App\Http\Livewire\Tags;

use App\Models\Tag;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;

class TagsTable extends LivewireDatatable
{
    public $model = Tag::class;
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

            Column::name('name')
                ->label('Name')
                ->searchable()
                ->filterable(),

            Column::name('slug')
            ->label('slug')
            ->searchable()
            ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('components.actions-button', ['id'=>$id]);
            })->label('Action'),  

        ];
    }
}
