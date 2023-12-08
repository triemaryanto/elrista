<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('get_role_user')) {
    function get_role_user()
    {
        return \Spatie\Permission\Models\Role::pluck('name', 'name');
    }
}

if (!function_exists('get_permission_user')) {
    function get_permission_user()
    {
        return \Spatie\Permission\Models\Permission::pluck('name', 'name');
    }
}

if (!function_exists('get_prov')) {
    function get_prov()
    {
        $response = Http::withHeaders([
            'Key' => '2ce3e71067298be75b7b116d08cc1410',
        ])->get('https://api.rajaongkir.com/starter/province');
     
        // Convert the array to a Laravel Collection
        $results = collect($response['rajaongkir']['results']);

        // Use pluck() on the Collection
        return $results->pluck( 'province', 'province_id');
    }
}

if (!function_exists('get_kab')) {
    function get_kab($code)
    {
         $response = Http::withHeaders([
            'Key' => '2ce3e71067298be75b7b116d08cc1410',
        ])->get('https://api.rajaongkir.com/starter/city?province='.$code .'');
     
        // Convert the array to a Laravel Collection
        $results = collect($response['rajaongkir']['results']);

        // Use pluck() on the Collection
        return $results->pluck( 'city_name', 'city_id');
    }
}

if (!function_exists('get_setting')) {
    function get_setting()
    {
        return \App\Models\SettingWeb::find(1);
    }
}