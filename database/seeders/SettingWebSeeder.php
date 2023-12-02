<?php

namespace Database\Seeders;

use App\Models\SettingWeb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SettingWebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satu = public_path('images/elrista.png');
        // Generate a relative path within the storage directory
        $dua = 'public/logo/logo.png';
        // Copy the file to the storage directory
        Storage::disk()->put($dua, file_get_contents($satu));

        SettingWeb::create([
            'site_name' => 'ELRISTA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,',
            'slogan' => '',
            'keywords' => '',
            'favicon' => '',
            'logo' => $dua,
            'address' => '',
            'phone' => '',
            'fax' => '',
            'email' => '',
            'link_fb' => '',
            'link_ig' => '',
            'link_x' => '',
            'link_linkedin' => '',
        ]);
    }
}
