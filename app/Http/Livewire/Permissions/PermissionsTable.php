<?php

namespace App\Http\Livewire\Permissions;

use Spatie\Permission\Models\Permission;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PermissionsTable extends LivewireDatatable
{
    public $model = Permission::class;
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

            Column::callback(['id'], function ($id) {
                return view('components.btn.btn-actions', ['id' => $id]);
            })->label('Action'),

        ];
    }
}
