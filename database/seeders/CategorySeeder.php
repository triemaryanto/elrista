<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Yoga Mats', 'image' => 'images/karpet.jpg', 'slug' => 'yoga-mats', 'created_at' => now()],
            ['name' => 'Sports Bra', 'image' => 'images/tangtop.jpg', 'slug' => 'sport-bra', 'created_at' => now()],
            ['name' => 'Leggings', 'image' => 'images/lagging.jpg', 'slug' => 'leggings', 'created_at' => now()],
            ['name' => 'TOps', 'image' => 'images/tops.jpg', 'slug' => 'tops', 'created_at' => now()],
        ];

         foreach ($data as $dt) {
            Category::create($dt);
        }
    }
}
