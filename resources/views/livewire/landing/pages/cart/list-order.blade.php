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
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    {{-- <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th scope="col">total</th>
                            </tr>
                        </thead>
                        @foreach ($data as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ url('') }}"><img
                                                src="{{ route('helper.show-picture', ['path' => $item->product->gambar_satu->img1]) }}"
                                                alt=""></a>
                                    </td>
                                    <td>{{ $item->product->name }}
                                    <td>
                                        <h2>Rp, {{ number_format($item->product->price, 0, ',', '.') }}</h2>
                                    </td>
                                    <td>
                                        {{ $item->qty }}
                                    </td>
                                    <td><a href="#" class="icon" wire:click="deleteCart({{ $item->id }})"><i
                                                class="ti-close"></i></a></td>
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

                    </table>--}}
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
