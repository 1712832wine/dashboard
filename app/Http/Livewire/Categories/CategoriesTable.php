<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;

class CategoriesTable extends LivewireDatatable
{
    public $model = Category::class;
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
            ->label('Slug')
            ->searchable()
            ->filterable(),

            Column::callback(['parent'], function ($parent) {
                if ($parent != '') return Category::find($parent)->name;
                else return "none";
            })->label('Parent'),

            Column::callback(['id','name'], function ($id, $name) {
                return view('components.actions-button', ['id'=>$id]);
            })->label('Action'),  

        ];
    }
}
