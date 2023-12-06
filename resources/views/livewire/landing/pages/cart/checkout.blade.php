@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12 text-end">
                                        <a href="#" wire:click="domestik" class="btn-solid btn">
                                            <i wire:loading wire:target="domestik" class="fa fa-spinner fa-spin"></i>
                                            Domestik
                                        </a>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <a href="#" wire:click='internasional' class="btn-solid btn">
                                            <i wire:loading wire:target="internasional"
                                                class="fa fa-spinner fa-spin"></i>
                                            Internasional</a>
                                    </div>
                                </div>
                                @if ($pengiriman)
                                    <label>Coming Soon</label>
                                @else
                                    {{-- domestik --}}
                                    <div class="row check-out">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">First Name</div>
                                            <input type="text" name="field-name" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Last Name</div>
                                            <input type="text" name="field-name" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Phone</div>
                                            <input type="text" name="field-name" value="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Email Address</div>
                                            <input type="text" name="field-name" value="" placeholder="">
                                        </div>

                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <div class="field-label">Provinsi</div>
                                            <select wire:model.live="provinsi_id">
                                                <option>Pilih Provinsi</option>
                                                @foreach ($provinsi_list as $provinsi)
                                                    <option value="{{ $provinsi['province_id'] }}">
                                                        {{ $provinsi['province'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                            <div class="field-label">Kota Tujuan</div>
                                            @if (empty($city_list))
                                                <i wire:loading
                                                    wire:target="provinsi_id"class="fa fa-refresh fa-spin"></i>
                                            @else
                                                <select wire:model.live="city_id">
                                                    <option>Pilih Kota Tujuan</option>
                                                    @foreach ($city_list as $city)
                                                        <option value="{{ $city['city_id'] }}">
                                                            {{ $city['city_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @endif


                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Postal Code</div>
                                            @if (empty($hasil))
                                                <i wire:loading wire:target="city_id"class="fa fa-refresh fa-spin"></i>
                                            @else
                                                <input type="text" name="field-name" value="{{ $postal_code }}"
                                                    placeholder="">
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <div class="field-label">Courier</div>
                                            <select wire:model="courier">
                                                <option>Pilih Courier</option>
                                                <option value="jne">JNE</option>
                                                <option value="tiki"> TIKI</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="button" wire:click="cekongkirdomestik"
                                                class ="btn-solid btn">
                                                <i wire:loading wire:target="cekongkirdomestik"
                                                    class="fa fa-spinner fa-spin"></i>
                                                Cek Ongkir
                                            </button>

                                        </div>
                                        @if (empty($rincian_ongkir))
                                        @else
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="account-option">Rincian Ongkir</label>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label>Kota Asal</label> :
                                                {{ $rincian_ongkir['origin_details']['city_name'] }}<br>
                                                <label>Kota Tujuan</label> :
                                                {{ $rincian_ongkir['destination_details']['city_name'] }}<br>
                                                <label>Berat Paket</label> : {{ $rincian_ongkir['query']['weight'] }}
                                                gram<br>
                                            </div>
                                            @foreach ($rincian_ongkir['results'] as $item)
                                                <div class="col-md-12">
                                                    <div class="field-label">Name : {{ $item['name'] }}</div>
                                                </div>
                                                @foreach ($item['costs'] as $cost)
                                                    @if (!empty($cost))
                                                        <div class="col-md-12">
                                                            <div class="field-label">Service : {{ $cost['service'] }}
                                                            </div>
                                                        </div>
                                                        @foreach ($cost['cost'] as $harga)
                                                            <div class="col-md-5">
                                                                <div class="field-label">Harga</div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="field-label">:</div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="field-label">{{ $harga['value'] }} (est:
                                                                    {{ $harga['etd'] }} Hari)</div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <input type="radio" wire:model.live="pilih_service"
                                                                    checked="checked" wire:click="hitungtotal"
                                                                    value={{ $harga['value'] }}>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <div class="col-md-12">
                                                            <div class="field-label">Service : {{ $cost['service'] }}
                                                                Tidak tercover
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endforeach

                                        @endif
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                            @foreach ($data as $cart)
                                                @php
                                                    $a = $cart->product->price * $cart->qty;
                                                @endphp
                                                <li>{{ $cart->product->name }} ×
                                                    {{ $cart->qty }}<span> Rp.
                                                        {{ number_format($a, 0, ',', '.') ?? '' }} </span>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count">
                                                    Rp.{{ number_format($subtotal, 0, ',', '.') ?? '' }} </span></span>
                                            </li>

                                        </ul>
                                        <ul class="qty">
                                            <li>Ongkir <span>
                                                    <div wire:loading wire:target='pilih_service'>
                                                        Akumulasi ..
                                                    </div>
                                                    Rp. {{ number_format($pilih_service, 0, ',', '.') ?? '' }}
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count"> Rp.
                                                    {{ number_format($total, 0, ',', '.') ?? '' }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment-group" id="payment-1"
                                                                checked="checked">
                                                            <label for="payment-1">Check Payments<span
                                                                    class="small-text">Please send a check
                                                                    to Store
                                                                    Name, Store Street, Store Town, Store
                                                                    State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment-group"
                                                                id="payment-2">
                                                            <label for="payment-2">Cash On Delivery<span
                                                                    class="small-text">Please send a check
                                                                    to Store
                                                                    Name, Store Street, Store Town, Store
                                                                    State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment-group"
                                                                id="payment-3">
                                                            <label for="payment-3">PayPal<span class="image"><img
                                                                        src=" {{ asset('multikart_all_in_one/') }}/assets/images/paypal.png"
                                                                        alt=""></span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end"><a href="#" class="btn-solid btn"
                                                wire:click="cobaSnap">Place Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@push('js')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        window.addEventListener('hitung', event => {

            snap.pay(event.detail.snapToken, {
                // Optional
                onSuccess: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    console.log(result)
                }
            });
        });
    </script>
@endpush
