<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\LabelColumn;
use App\Http\Livewire\User\UsersComponent;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
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

            Column::name('email')
                ->label('Email')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->label('Created at'),

            Column::callback(['id'], function ($id) {
                return view('components.actions-button', ['id'=>$id]);
            })->label('Action'),  

        ];
    }
}
