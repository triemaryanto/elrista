<?php

namespace App\Livewire\Landing\Pages\Cart;


use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Checkout extends Component
{
    public $pengiriman = false, $provinsi_id, $city_id, $city_list = [], $hasil = [], $rincian_ongkir=[], $postal_code, $weight, $courier, $cost = []; 

    public $origin = 501, $ongkir , $etd, $pilih_service, $subtotal, $total;

    public $data;

   public function domestik(){
    $this->pengiriman = false;
   }

   public function internasional(){
     $this->pengiriman = true;
   }

   public function cekongkirdomestik(){
             $response = Http::withHeaders([
            'Key' => '87ad5c88a0a97bb8cab0c2f25ae82ca9',
            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin' => $this->origin,
                'destination' => $this->city_id,
                'weight' => $this->weight,
                'courier' => $this->courier
            ]);
            
            $this->rincian_ongkir = $response['rajaongkir'];

            $this->total = $this->subtotal + $this->pilih_service;
   }

   public function hitungtotal(){
    $this->total = $this->subtotal + $this->pilih_service;
   }
   public function mount(){
    $this->data = Cart::with('product')->where('user_id', auth()->user()->id)->get();

    $this->weight = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', '=', auth()->user()->id)
    ->sum(DB::raw('products.weight * carts.qty'));

    $this->subtotal = DB::table('carts')
    ->join('products', 'carts.product_id', '=', 'products.id')
    ->where('carts.user_id', '=', auth()->user()->id)
    ->sum(DB::raw('products.price * carts.qty'));

    
   }
    public function render()
    {
        $response = Http::withHeaders([
            'Key' => '87ad5c88a0a97bb8cab0c2f25ae82ca9',
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinsi_list = $response['rajaongkir']['results'];

        if (isset($this->provinsi_id)) {
            $this->city_list = [];

            $response = Http::withHeaders([
                'Key' => '87ad5c88a0a97bb8cab0c2f25ae82ca9',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id);

            $this->city_list = $response['rajaongkir']['results'];
        }
        if(isset($this->city_id)){
            $response = Http::withHeaders([
            'Key' => '87ad5c88a0a97bb8cab0c2f25ae82ca9',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id.'&id='.$this->city_id);

            $this->hasil = $response['rajaongkir']['results'];
            $this->postal_code = $this->hasil['postal_code'];
        }
        
        return view('livewire.landing.pages.cart.checkout', [
            'provinsi_list' => $provinsi_list,
        ])->layout('layouts.front.app');
    }
}
