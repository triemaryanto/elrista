<?php

namespace App\Livewire\Landing\Pages\Cart;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Checkout extends Component
{
    public $pengiriman = false, $provinsi_id, $city_id, $city_list = [], $hasil = [], $rincian_ongkir=[], $postal_code, $weight = 1200, $courier, $cost = []; 

    public $origin = 501, $ongkir , $etd, $pilih_service;

   
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

        if (isset($this->courier)) {
             $response = Http::withHeaders([
            'Key' => '87ad5c88a0a97bb8cab0c2f25ae82ca9',
            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin' => $this->origin,
                'destination' => $this->city_id,
                'weight' => $this->weight,
                'courier' => $this->courier
            ]);
            
            $this->rincian_ongkir = $response['rajaongkir'];
        }
        return view('livewire.landing.pages.cart.checkout', [
            'provinsi_list' => $provinsi_list,
        ])->layout('layouts.front.app');
    }
}
