<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Id','id')
                ->sortable()->searchable(),
            Column::make('Name')
                ->sortable()->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()->searchable(),
            Column::make('Created_at', 'Created')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query();
    }
}
