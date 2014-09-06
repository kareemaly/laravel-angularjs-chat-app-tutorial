<?php

class UserSeeder extends \Illuminate\Database\Seeder {


    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username' => 'kareem3d',
            'email' => 'kareem3d.a@gmail.com',
            'password' => Hash::make('kareem123')
        ));

        User::create(array(
            'username' => 'mohamed3d',
            'email' => 'mohamed3.a@gmail.com',
            'password' => Hash::make('mohamed123')
        ));
    }

} 