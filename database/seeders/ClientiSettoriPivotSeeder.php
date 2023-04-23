<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientiSettoriPivotSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('clienti_settori_pivot')->insert([
            'clienti_id' => 1,
            'settori_id' => 1,
        ]);
        DB::table('clienti_settori_pivot')->insert([
            'clienti_id' => 1,
            'settori_id' => 3,
        ]);
        DB::table('clienti_settori_pivot')->insert([
            'clienti_id' => 2,
            'settori_id' => 4,
        ]);
        DB::table('clienti_settori_pivot')->insert([
            'clienti_id' => 2,
            'settori_id' => 2,
        ]);
        DB::table('clienti_settori_pivot')->insert([
            'clienti_id' => 2,
            'settori_id' => 5,
        ]);

    }
}
