<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientiSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        //todo: move to factory when Model is ready
        DB::table('clienti')->insert([
            'username'        => 'test_client_1',
            'ragione_sociale' => 'Azienda test 1',
            'email'           => 'client1@example.com',
            'telefono'        => '5555 555555',
            'rating'          => 5,
            'piva'            => 'SVKSNM51A67C155N ',
            'cf'              => 'SVKSNM51A67C155N ',
            'indirizzo'       => 'Via lorem 141, pt',
            'inizio_attivita' => '1920-01-15',
            'password'        => Hash::make('1234'),
            'tipi_id'         => 1,
            'note'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum tortor a erat tristique auctor. Integer venenatis id dui ac accumsan. Nulla facilisi. Ut in mi vitae nibh imperdiet congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sed sem at rutrum. Curabitur hendrerit sapien sed nunc maximus aliquam. Proin placerat malesuada leo, sit amet consequat ipsum euismod a. Donec cursus dolor eget dolor consectetur mollis. Donec convallis dignissim imperdiet.',
        ]);

        DB::table('clienti')->insert([
            'username'               => 'test_client_2',
            'ragione_sociale'        => 'Privato test 1',
            'email'                  => 'client2@example.com',
            'telefono'               => '5555 444444',
            'piva'                   => 'PXTNSF53T24L626Y ',
            'cf'                     => 'PXTNSF53T24L626Y ',
            'indirizzo'              => 'Via Ipsum 147, pz',
            'inizio_attivita'        => '2020-06-15',
            'tipi_id'                => 2,
            'password'               => Hash::make('4321'),
            'attach_visura_camerale' => 'visure_camerali/wiZxalZBbezS6rlvd5EdrQqVL12l07kkJwPT1Mze.pdf',
        ]);
    }
}
