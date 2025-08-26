<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        //crear usuario si no existe el correo
        if (!User::where('email', 'tecnico@greetik.com')->exists()) {
            User::create([
                'name' => 'David',
                'email' => 'tecnico@greetik.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }
}
