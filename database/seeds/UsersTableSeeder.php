<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yan David',
            'email' => 'yandavid80@gmail.com',
            'password' => bcrypt('123456'),
            'cpf' => '000.000.000-00',
            'birthday' => '1999-06-19',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua 31 de Março',
            'complement' => 'Casa',
            'number' => '123',
            'city' => 'Retirolândia',
            'state' => 'BA',
            'country' => 'Brasil',
            'zipcode' => '48750-000',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('phones')->insert([
            'phone' => '(75) 98200-1871',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
