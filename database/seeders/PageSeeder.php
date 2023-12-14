<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'author' => '1',
            'title' => 'Secure Shopping',
            'content' => '',
        ]);
        Page::create([
            'author' => '1',
            'title' => 'Contacts',
            'content' => '',
        ]);
    }
}
