<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Tere Liye',
                'birth_date' => '1979-05-21',
                'bio' => 'Penulis novel produktif asal Sumatera Selatan dengan puluhan karya best seller.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Andrea Hirata',
                'birth_date' => '1967-10-24',
                'bio' => 'Penulis novel Laskar Pelangi asal Belitung yang karyanya sukses hingga kancah internasional.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}