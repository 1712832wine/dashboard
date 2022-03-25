<?php

namespace App\Http\Livewire\Albums;

use Spatie\Permission\Models\Role;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class AlbumsTable extends LivewireDatatable
{
    public $model = Role::class;
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
                $role = Role::find($id);
                return $role->permissions->pluck('name');
            })->label('Permissions'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('components.btn.btn-actions', ['id' => $id]);
            })->label('Action'),

        ];
    }
}
