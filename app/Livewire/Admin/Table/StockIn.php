<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Stock;

class StockIn extends DataTableComponent
{
    protected $model = Stock::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {
        return Stock::with('product')->where('type', 'In');
    }
    public function columns(): array
    {
        return [
            Column::make("Id Stock", "id")
                ->sortable(),
            Column::make("Id Produk", "product.id")
                ->sortable(),
            Column::make('Product', 'product.name')->sortable()->searchable(),
            Column::make('Qty', 'qty')->sortable()->searchable(),
            Column::make("Tanggal Masuk", "tgl_masuk")->sortable()->searchable(),
            Column::make("Oleh", "user.name")->sortable()->searchable(),
            Column::make('Action', 'id')->view('components.table-action'),
        ];
    }
}
