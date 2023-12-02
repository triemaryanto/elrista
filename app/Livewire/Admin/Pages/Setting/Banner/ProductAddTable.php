<?php

namespace App\Livewire\Admin\Pages\Setting\Banner;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductAddTable extends DataTableComponent
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
            Column::make("Name", "name")
                ->sortable(),
            Column::make('Image', 'id')->searchable(
                function ($query, $searchTerm) {
                    $query->where('name', 'like', '%' . $searchTerm . '%');
                }
            )->format(
                function ($value, $row, Column $column) {
                    $data = Product::find($row->id);
                    if ($row->gambar_satu->img1 == 0) {
                        return 'none';
                    } else {
                        return ' <div class="col-name">
                                        <div class="left">
                                            <img class="" src="' . route("helper.show-picture", ["path" => $row->gambar_satu->img1]) . '" width="100px>"
                                        </div>
                                    </div>';
                    }
                }
            )->html(),

            Column::make("Action", "id")->format(function ($value, $row, Column $colmn) {
                return '<button type="submit" class="btn btn-primary text-right" wire:click="$emit(\'GetProduct\', ' . $row->id . ')">Get</button>';
            })->html(),
        ];
    }
}
