<?php

namespace App\Livewire\Admin\Table;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\LookBook;

class LookBookList extends DataTableComponent
{
    protected $model = LookBook::class;


    public function AddProduct_link()
    {
    }
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Judul", "name")->searchable()->sortable(),
            Column::make('Images', 'image')->format(
                function ($value, $row, Column $column) {
                    if ($row->image == 0) {
                        return 'none';
                    } else {
                        return '<img src="' . route("helper.show-picture", ["path" => $row->image]) . '" width="100px>"';
                    }
                }
            )->html(),
            Column::make("Action", "id")->view('components.table-action'),
        ];
    }
}
