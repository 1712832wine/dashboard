<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable=true;

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
                ->label('Name')->searchable()->filterable(),

            Column::name('email')->searchable()->filterable()->label('Email'),

            DateColumn::name('created_at')
                ->label('Created at')
        ];
    }
}
