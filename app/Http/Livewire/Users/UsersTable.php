<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = true;
    public $complex = true;

    public function openForm($id)
    {
        // $this->emit();
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

            Column::name('email')
                ->label('Email')
                ->searchable()
                ->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                $user = User::find($id);
                return $user->roles->pluck('name');
            })->label('Role'),

            Column::callback(['id'], function ($id) {
                return view('components.btn.btn-actions', ['id' => $id]);
            })->label('Action'),

        ];
    }
}
