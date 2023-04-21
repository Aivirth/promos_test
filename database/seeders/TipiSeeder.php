<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipi')->insert([
            'nome' => 'business',
        ]);
        DB::table('tipi')->insert([
            'nome' => 'privato',
        ]);
    }
}
