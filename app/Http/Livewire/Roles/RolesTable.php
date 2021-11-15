<?php

namespace App\Http\Livewire\Roles;

use Spatie\Permission\Models\Role;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;

class RolesTable extends LivewireDatatable
{
    public $model = Role::class;
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

            // Column::checkbox(),

            Column::name('name')
                ->label('Name')
                ->searchable()
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('components.actions-button', ['id'=>$id]);
            })->label('Action'),  

        ];
    }
}
