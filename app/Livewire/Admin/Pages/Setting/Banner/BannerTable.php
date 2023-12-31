<?php

namespace App\Livewire\Admin\Pages\Setting\Banner;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Banner;

class BannerTable extends DataTableComponent
{
    protected $model = Banner::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Action", "id")->format(function ($value, $row, Column $colmn) {
                return '<button type="button" class="btn btn-primary text-right" wire:click="$emit(\'edit\', ' . $row->id . ')">Edit</button>';
            })->html(),
        ];
    }
}
