<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettoriSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('settori')->insert([
            'nome' => 'informatica',
        ]);
        DB::table('settori')->insert([
            'nome' => 'edilizia',
        ]);
        DB::table('settori')->insert([
            'nome' => 'immobiliare',
        ]);
        DB::table('settori')->insert([
            'nome' => 'salute',
        ]);
        DB::table('settori')->insert([
            'nome' => 'finanza',
        ]);

    }
}
