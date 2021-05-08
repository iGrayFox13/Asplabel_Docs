<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Alvaro Andres Perez Sanchez',
            'email'=>'igrayfoxi13@gmail.com',
            'password'=>Hash::make('19602010a'),
            'rol'=>'Administrador',
        ]);
    }
}
