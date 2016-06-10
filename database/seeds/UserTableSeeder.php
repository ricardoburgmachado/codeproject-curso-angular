<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){


        //\CodeProject\Entities\User::truncate();//apaga os registros

        /*
        factory(\CodeProject\Entities\User::class)->create([
            'name' => 'ricardo',
            'email' => 'ricardoburgmachado@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        */



        factory(\CodeProject\Entities\User::class, 10)->create();

    }
}
