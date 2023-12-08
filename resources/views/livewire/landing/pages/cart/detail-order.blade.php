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
                            <li class="breadcrumb-item" href="{{ route('listorder') }}">Order</li>
                            <li class="breadcrumb-item active">Order</li>
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
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        @foreach ($data->detail_order as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ url('') }}"><img
                                                src="{{ route('helper.show-picture', ['path' => $item->product->gambar_satu->img1]) }}"
                                                alt=""></a>
                                    </td>
                                    <td>{{ $item->product->name }}
                                    <td>
                                        <h2>Rp, {{ number_format($item->price, 0, ',', '.') }}</h2>
                                    </td>
                                    <td>
                                        {{ $item->qty }}
                                    </td>
                                    <td>
                                        @php
                                            $sub = $item->product->price * $item->qty;
                                        @endphp
                                        <h2 class="td-color">
                                            Rp,
                                            {{ number_format($sub, 0, ',', '.') }}</h2>
                                    </td>
                                </tr>
                            </tbody>
                            @php
                                $tot += $sub;
                            @endphp
                        @endforeach
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Pengiriman lewat {{ $data->courier }}</td>
                                <td>
                                    <h2>Rp,
                                        {{ number_format($data->pilih_service, 0, ',', '.') }}</h2>
                                </td>
                                <td>1</td>
                                <td>
                                    <h2>Rp,
                                        {{ number_format($data->pilih_service, 0, ',', '.') }}</h2>
                                </td>
                            </tr>
                            @php
                                $tot += $data->pilih_service;
                            @endphp
                        </tbody>
                    </table>
                    <div class="table-responsive-md">
                        <table class="table cart-table ">
                            <tfoot>
                                <tr>
                                    <td>total price :</td>
                                    <td>
                                        <h2>Rp, {{ number_format($tot, 0, ',', '.') }}</h2>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row cart-buttons">
                <div class="col-6"><a href="{{ route('listorder') }}" class="btn btn-solid">Back</a></div>
                <div class="col-6">
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
