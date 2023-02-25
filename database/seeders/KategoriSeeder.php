<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->delete();
        $data = 
            [
                [
                    'kategori' => 'Mudah'
                ],
                [
                    'kategori' => 'Sedang'
                ],
                [
                    'kategori' => 'Sulit'
                ],
            ];
            Kategori::insert($data);
    }
}
