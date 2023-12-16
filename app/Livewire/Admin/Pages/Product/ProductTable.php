<?php

namespace App\Livewire\Admin\Pages\Product;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): Builder
    {
        return Product::with('gambar_satu');
    }
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "Name")
                ->sortable()->searchable(),
            Column::make('Images', 'gambar_satu.img1')->format(
                function ($value, $row, Column $column) {
                    if ($row->gambar_satu->img1 == 0) {
                        return 'none';
                    } else {
                        return '<img src="' . route("helper.show-picture", ["path" => $row->gambar_satu->img1]) . '" width="100px>"';
                    }
                }
            )->html(),
            Column::make("Stock", "stock")
                ->sortable()->searchable(),
            Column::make('Action', 'id')
                ->view('components.table-action')
        ];
    }
}
