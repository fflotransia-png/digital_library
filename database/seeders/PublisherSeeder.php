<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('publishers')->insert([
            [
                'name' => 'Gramedia Pustaka Utama',
                'address' => 'Jl. Palmerah Barat 29-37, Gelora, Tanah Abang, Jakarta Pusat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mizan Publika',
                'address' => 'Jl. Cinambo No. 135, Cisaranten Wetan, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}