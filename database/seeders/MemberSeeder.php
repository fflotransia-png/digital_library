<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'name' => 'Ali Syahputra',
                'email' => 'ali@mail.com',
                'phone' => '081234567890',
                'address' => 'Jl. T. Nyak Arief No. 45, Syiah Kuala, Banda Aceh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@mail.com',
                'phone' => '081987654321',
                'address' => 'Jl. Teuku Umar No. 12, Setui, Banda Aceh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}