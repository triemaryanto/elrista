<?php

namespace App\Livewire\Admin\Pages\Order;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Order;

class OrderUserTable extends DataTableComponent
{
    protected $model = Order::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User", "user.name")
                ->sortable(),
            Column::make("NO ORDER", "number")
                ->sortable()
                ->format(
                    function ($value, $row, Column $column) {
                        return '<button type="button" class="btn btn-link" wire:click="$emit(\'view\', ' . $row->id . ')">' . $row->number . '</button>';
                    }

                )
                ->html(),
            Column::make("Status", "payment_status")
                ->sortable()
                ->format(
                    function ($value, $row, Column $column) {
                        // 1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal
                        if ($row->payment_status == 1) {
                            return '<span class="badge badge-primary d-block">menunggu pembayaran</span>';
                        }
                        if ($row->payment_status == 2) {
                            return '<span class="badge badge-info d-block">sudah bayar</span>';
                        }
                        if ($row->payment_status == 3) {
                            return '<span class="badge badge-secondary d-block">kadaluarsa</span>';
                        }
                        if ($row->payment_status == 4) {
                            return '<span class="badge badge-warning d-block">Batal</span>';
                        }
                        if ($row->payment_status == 5) {
                            return '<span class="badge badge-primary d-block">Selesai</span>';
                        }
                    }

                )
                ->html(),
            Column::make("Created at", "created_at")
                ->sortable()->searchable()
                ->format(function ($value) {
                    return $value->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, j F Y');
                }),
        ];
    }
}
