<?php

namespace App\Livewire\Landing\Pages\Cart;


use App\Models\Cart;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Redirect;

class Checkout extends Component
{
    public $provinsi_list, $pengiriman = false, $provinsi, $provinsi_id, $city, $city_id, $city_list = [], $hasil = [], $rincian_ongkir = [], $postal_code, $weight, $courier, $cost = [], $snapToken;

    public $origin = 501, $ongkir, $etd, $pilih_service, $subtotal, $total, $status, $address, $wa;

    public $data, $order;

    protected $listeners = ['toListOrder', 'berhasiltoListOrder'];

    public function domestik()
    {
        $this->pengiriman = false;
    }

    public function internasional()
    {
        $this->pengiriman = true;
    }

    public function cekongkirdomestik()
    {

        $rules['provinsi_id'] = 'required';
        $rules['city_id'] = 'required';
        $rules['courier'] = 'required';
        $rules['postal_code'] = 'required';
        $rules['address'] = 'required|255';
        $this->validate($rules);

        $response = Http::withHeaders([
            'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $this->origin,
            'destination' => $this->city_id,
            'weight' => $this->weight,
            'courier' => $this->courier,
        ]);

        // dd($response);

        $this->rincian_ongkir = $response['rajaongkir'];

        $this->provinsi = $this->rincian_ongkir['destination_details']['province'];
        $this->city = $this->rincian_ongkir['destination_details']['city_name'];

        $this->total = $this->subtotal + $this->pilih_service;
    }

    public function hitungtotal()
    {
        $this->total = $this->subtotal + $this->pilih_service;
    }

    public function berhasiltoListOrder()
    {
        if ($this->status == 'settlement') {
            $this->order->payment_status = 2;
            $this->order->save();
            return Redirect::to('/listorder')->with('success', 'Pembayaran Berhasil...');;
        } else {
            return Redirect::to('/listorder');
        }
    }

    public function toListOrder()
    {
        return Redirect::to('/listorder');
    }

    public function pay()
    {
        $rules['total'] = 'required';
        $rules['subtotal'] = 'required';
        $rules['pilih_service'] = 'required';
        $rules['provinsi_id'] = 'required';
        $rules['city_id'] = 'required';
        $rules['courier'] = 'required';
        $rules['postal_code'] = 'required';
        $rules['address'] = 'required|255';
        $rules['wa'] = 'required|max:20';
        $this->validate($rules);

        $user = User::find(auth()->user()->id);
        $user->wa = $this->wa;
        $user->save();

        $this->order->provinsi = $this->provinsi;
        $this->order->provinsi_id = $this->provinsi_id;
        $this->order->city = $this->city;
        $this->order->city_id = $this->city_id;
        $this->order->courier = $this->courier;
        $this->order->postal_code = $this->postal_code;
        $this->order->weight = $this->weight;
        $this->order->pilih_service = $this->pilih_service;
        $this->order->total_price = $this->total;
        $this->order->addres = $this->address;
        $this->order->save();
        if ($this->order->snap_token) {
            $this->snapToken = $this->order->snap_token;
        } else {
            $midtrans = new CreateSnapTokenService($this->order->id);
            $this->snapToken = $midtrans->getSnapToken();
            $this->order->snap_token = $this->snapToken;
            $this->order->save();
        }


        $this->dispatchBrowserEvent('hitung', [
            'snapToken' => $this->snapToken,
        ]);
    }

    public function mount($idnya)
    {
        $this->order = Order::find($idnya);

        $this->provinsi = $this->order->provinsi ?? null;
        $this->provinsi_id = $this->order->provinsi_id ?? null;
        $this->city = $this->order->city ?? null;
        $this->city_id = $this->order->city_id ?? null;
        $this->courier = $this->order->courier ?? null;
        $this->postal_code = $this->order->postal_code ?? null;
        $this->weight = $this->order->weight ?? null;
        $this->pilih_service = $this->order->pilih_service ?? null;
        $this->total = $this->order->total_price ?? null;

        $this->data = DetailOrder::with('product')->where('user_id', auth()->user()->id)->where('order_id', $idnya)->get();

        $this->weight = DetailOrder::join('products', 'detail_orders.product_id', '=', 'products.id')
            ->where('detail_orders.user_id', '=', auth()->user()->id)->where('order_id', $idnya)
            ->sum(DB::raw('products.weight * detail_orders.qty'));

        $this->subtotal = DetailOrder::join('products', 'detail_orders.product_id', '=', 'products.id')->where('user_id', auth()->user()->id)->where('order_id', $idnya)->sum(DB::raw('products.price * detail_orders.qty'));
    }

    public function render()
    {
        $response = Http::withHeaders([
            'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinsi_list = $response['rajaongkir']['results'];
        $this->provinsi_list = $response['rajaongkir']['results'];

        if (isset($this->provinsi_id)) {
            $this->city_list = [];

            $response = Http::withHeaders([
                'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id);

            $this->city_list = $response['rajaongkir']['results'];
        }
        if (isset($this->city_id)) {
            $response = Http::withHeaders([
                'Key' => 'fdeafd9b4b4ebaea6268209487c8b765',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id . '&id=' . $this->city_id);

            $this->hasil = $response['rajaongkir']['results'];
            $this->postal_code = $this->hasil['postal_code'];
        }

        return view('livewire.landing.pages.cart.checkout', [
            'provinsi_list' => $provinsi_list,
        ])->layout('layouts.front.app');
    }
}
