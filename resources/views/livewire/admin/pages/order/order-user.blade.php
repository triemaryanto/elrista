<div>
    <x-slot name="header">
        <livewire:admin.global.page-header judul="Order" subjudul="User" :breadcrumb="['Order', 'User']" />
    </x-slot>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Order User</h5>
        </div>

        <div class="card-body">
            @if ($view)
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered mb-2">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $order->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>NO</td>
                                    <td>{{ $order->user->wa }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $order->provinsi }}, {{ $order->city }}, postal code :
                                        {{ $order->postal_code }} </td>
                                </tr>
                                <tr>
                                    <td>Pengiriman</td>
                                    <td>{{ $order->courier }}, Rp,
                                        {{ number_format($order->pilih_service, 0, ',', '.') }} </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>
                                        Rp,
                                        {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Harga</th>
                                <th>qty</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->detail_order as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ url('') }}"><img
                                                src="{{ route('helper.show-picture', ['path' => $value->product->gambar_satu->img1]) }}"
                                                alt="" width="20"></a>
                                    </td>
                                    <td>{{ $value->product->name }}
                                    <td>
                                        Rp. {{ number_format($value->product->price, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ $value->qty }}
                                    </td>
                                    <td>
                                        <span class="badge"
                                            style="background-color: {{ $value->color->color }}; color:{{ $value->color->color }};">
                                            = = </span>
                                    </td>
                                    <td>
                                        {{ $value->size->size }}
                                    </td>
                                    <td>
                                        @php
                                            $sub = $value->product->price * $value->qty;
                                        @endphp
                                        Rp,
                                        {{ number_format($sub, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" wire:click='close'>Back <i
                            class="icon-arrow-left16 ml-2"></i></button>
                </div>
            @else
                <livewire:admin.pages.order.order-user-table />
            @endif
        </div>
    </div>

</div>
