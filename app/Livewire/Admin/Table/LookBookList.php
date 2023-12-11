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
            Column::make("Images", "images")
                ->sortable(),
            Column::make("Action", "id")
                ->sortable(),
        ];
    }
}
