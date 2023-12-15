<?php

namespace App\Livewire\Admin\Pages\Page;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Page;

class PageViewTable extends DataTableComponent
{
    protected $model = Page::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Title", "title")
                ->sortable(),
            Column::make("#", "id")
                ->format(
                    function ($value, $row, Column $column) {
                        return '<button type="button" class="btn btn-primary" wire:click="$emit(\'edit\', ' . $row->id . ')"> Edit </button>';
                    }

                )
                ->html(),
        ];
    }
}
