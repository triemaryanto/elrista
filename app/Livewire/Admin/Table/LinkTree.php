<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Linktree as ModelLinktree;

class LinkTree extends DataTableComponent
{
    protected $model = ModelLinktree::class;

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
            Column::make("Link", "url")
                ->sortable(),
            Column::make("Action", "id")->view('components.table-action'),
        ];
    }
}
