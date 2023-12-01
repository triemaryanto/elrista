<?php

namespace App\Livewire\Admin\Pages\Product;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "Name")
                ->sortable()->searchable(),
            Column::make('Action', 'id')
                ->view('components.table-action')
        ];
    }
}
