<?php

namespace Database\Seeders;
use Faker\Generator as FakerGenerator;
use Faker\Core as Faker;
use Faker\Provider\it_IT\Company as FakerItCompany;
use Faker\Provider\it_IT\Person as FakerItPerson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientiSeeder extends Seeder {
    /**
     * Run the database seeds.
     */

    public function run(): void {


        //Create non admin users
        DB::table('users')->insert([
            'id'       => 2,
            'username' => 'test_user2',
            'email'    => 'testuser1@test.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('clienti')->insert([
            'ragione_sociale' => 'Azienda test 2',
            'telefono'        => '5555 55555',
            'rating'          => 5,
            'piva'            => 'SVKSNM51A67C155N',
            'cf'              => 'SVKSNM51A67C155N',
            'indirizzo'       => 'via lorem 2',
            'inizio_attivita' => '1990-04-13',
            'tipi_id'         => 1,
            'user_id'         => 2,
            'note'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum tortor a erat tristique auctor. Integer venenatis id dui ac accumsan. Nulla facilisi. Ut in mi vitae nibh imperdiet congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sed sem at rutrum. Curabitur hendrerit sapien sed nunc maximus aliquam. Proin placerat malesuada leo, sit amet consequat ipsum euismod a. Donec cursus dolor eget dolor consectetur mollis. Donec convallis dignissim imperdiet.',
        ]);

        DB::table('users')->insert([
            'id'       => 3,
            'username' => 'test_user2',
            'email'    => 'testuser2@test.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('clienti')->insert([
            'ragione_sociale' => 'Azienda test 3',
            'telefono'        => '5555 55556',
            'rating'          => 5,
            'piva'            => 'SVKSNM51A67C8907',
            'cf'              => 'SVKSNM51A67C8907',
            'indirizzo'       => 'via lorem 3',
            'inizio_attivita' => '1992-04-13',
            'tipi_id'         => 2,
            'user_id'         => 3,
            'note'            => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum tortor a erat tristique auctor. Integer venenatis id dui ac accumsan. Nulla facilisi. Ut in mi vitae nibh imperdiet congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sed sem at rutrum. Curabitur hendrerit sapien sed nunc maximus aliquam. Proin placerat malesuada leo, sit amet consequat ipsum euismod a. Donec cursus dolor eget dolor consectetur mollis. Donec convallis dignissim imperdiet.',
        ]);


        DB::table('users')->insert([
            'id'       => 4,
            'username' => 'test_user4',
            'email'    => 'testuser4@test.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('clienti')->insert([
            'ragione_sociale' => 'Azienda test 4',
            'telefono'        => '5555 55465',
            'rating'          => 2,
            'piva'            => 'SVKSNM51A67CQWER',
            'cf'              => 'SVKSNM51A67CQWER',
            'indirizzo'       => 'via lorem 4',
            'inizio_attivita' => '2014-11-20',
            'tipi_id'         => 1,
            'user_id'         => 4,
            'attach_visura_camerale' =>'visure_camerali/9bVkGepEzxt7Pvu7ZsZHDRK4Q3gnG1lqgvxfkoIL.pdf'
        ]);

        DB::table('users')->insert([
            'id'       => 5,
            'username' => 'test_user5',
            'email'    => 'testuser@test.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('clienti')->insert([
            'ragione_sociale' => 'Privato test 5',
            'telefono'        => '5678 55555',
            'rating'          => 10,
            'piva'            => 'SVKHJUTA67C155N',
            'cf'              => 'SVKHJUTA67C155N',
            'indirizzo'       => 'via lorem 5',
            'inizio_attivita' => '2022-07-13',
            'tipi_id'         => 2,
            'user_id'         => 5,
            'note'            => 'Lorem ipsufg hh it amet, consectetur adipiscing elit. Duis elementum tortor a erat tristique auctor. Integer venenatis id dui ac accumsan. Nulla facilisi. Ut in mi vitae nibh imperdiet congue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus rhoncus sed sem at rutrum. Curabitur hendrerit sapien sed nunc maximus aliquam. Proin placerat malesuada leo, sit amet consequat ipsum euismod a. Donec cursus dolor eget dolor consectetur mollis. Donec convallis dignissim imperdiet.',
        ]);
    }
}
