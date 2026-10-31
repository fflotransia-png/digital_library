<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Bumi',
                'isbn' => '978-602-03-0112-9',
                'category' => 'Fiksi / Fantasi',
                'stock' => 10,
                'publication_year' => 2014,
                'author_id' => 1,
                'publisher_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Laskar Pelangi',
                'isbn' => '978-979-3062-79-2',
                'category' => 'Novel Inspiratif',
                'stock' => 7,
                'publication_year' => 2005,
                'author_id' => 2,
                'publisher_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}