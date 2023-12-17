<?php

namespace App\Livewire\Admin\Pages\Setting\Blog;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Blog;

class BlogTable extends DataTableComponent
{
    protected $model = Blog::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Image", "picture")
                ->format(function ($value, $row, Column $colmn) {
                    return '<img src="' . route('helper.show-picture', ['path' => $row->picture]) . '" width="500" alt="" class="img-fluid">';
                })->html(),
            Column::make("Title", "title")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Action', 'id')->view('components.table-action'),
        ];
    }
}
