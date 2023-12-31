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
            'slogan' => null,
            'keywords' => null,
            'favicon' => null,
            'logo' => $dua,
            'address' => null,
            'phone' => null,
            'fax' => null,
            'email' => null,
            'link_fb' => null,
            'link_ig' => null,
            'link_x' => null,
            'link_linkedin' => null,
        ]);
    }
}
