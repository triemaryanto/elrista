<?php

namespace App\Livewire\Landing\Pages\Cart;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{
    public $pengiriman = false, $provinsi_id, $city_id, $city_list = [], $hasil = [], $cek_ongkir=[], $postal_code, $weight, $courier, $cost = []; 

    public $origin = 501, $ongkir , $etd;

   
    public function render()
    {
        $response = Http::withHeaders([
            'Key' => '2ce3e71067298be75b7b116d08cc1410',
        ])->get('https://api.rajaongkir.com/starter/province');
        $provinsi_list = collect($response['rajaongkir']['results']);

        if (isset($this->provinsi_id)) {
            $this->city_list = [];

            $response = Http::withHeaders([
                'Key' => '2ce3e71067298be75b7b116d08cc1410',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id);

            $this->city_list = $response['rajaongkir']['results'];
        }
        if(isset($this->city_id)){
            $response = Http::withHeaders([
            'Key' => '2ce3e71067298be75b7b116d08cc1410',
            ])->get('https://api.rajaongkir.com/starter/city?province=' . $this->provinsi_id.'&id='.$this->city_id);

            $this->hasil = $response['rajaongkir']['results'];
            $this->postal_code = $this->hasil['postal_code'];
        }

        if (isset($this->weight) && isset($this->courier)) {
             $response = Http::withHeaders([
            'Key' => '2ce3e71067298be75b7b116d08cc1410',
            ])->get('https://api.rajaongkir.com/starter/cost?origin='. $this->origin. '&destination='.$this->city_id.'&weight='.$this->weight.'&courier='.$this->courier);
            
            $this->cek_ongkir = $response['rajaongkir']['results'];
            $this->cost = $this->cek_ongkir['costs']['cost'];
            $this->ongkir = $this->cost['value'];
        }
        return view('livewire.landing.pages.cart.checkout', [
            'provinsi_list' => $provinsi_list,
        ])->layout('layouts.front.app');
    }
}
