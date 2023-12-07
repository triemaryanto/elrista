<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>List Order</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">List Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 table-responsive-xs">
                    @if (session()->has('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">username</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">price</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        {{ $item->user->name }}
                                    </td>
                                    <td>
                                        {{ $item->number }}
                                    <td>
                                        <h2>Rp, {{ number_format($item->total_price, 0, ',', '.') }}</h2>
                                    </td>
                                    <td>
                                        @php
                                            // 1=menunggu pembayaran, 2=sudah dibayar, 3=kadaluarsa, 4=batal
                                            if ($item->payment_status == 1) {
                                                echo 'menunggu pembayaran';
                                            }
                                            if ($item->payment_status == 2) {
                                                echo 'sudah bayar';
                                            }
                                            if ($item->payment_status == 3) {
                                                echo 'kadaluarsa';
                                            }
                                            if ($item->payment_status == 4) {
                                                echo 'batal';
                                            }
                                            if ($item->payment_status == 5) {
                                                echo 'selesai';
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @if ($item->payment_status == 2)
                                            <button type="button" class="btn btn-info btn-xs"
                                                wire:click="sampai({{ $item->id }})">
                                                Konfirmasi Sampai
                                            </button>
                                        @endif
                                        @if ($item->payment_status == 1)
                                            <a href="{{ route('checkout', $item->id) }}" class="btn btn-info btn-xs">
                                                Pay
                                            </a>
                                            <button type="button" class="btn btn-info btn-xs"
                                                wire:click="batal({{ $item->id }})">
                                                Batal
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{ route('shop') }}" class="btn btn-solid">continue shopping</a></div>
                <div class="col-6"><button type="button" wire:click='checkout' class="btn btn-solid">check
                        out</button>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
