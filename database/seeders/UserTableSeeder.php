<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();

        $user = new User;
        $user->name = 'Administrador';
        $user->email = 'administrador@admin.com';
        $user->document = '1073528364';
        $user->password = 'password'; // password
        $user->save();

        $user = new User;
        $user->name = 'Juan Maldonado';
        $user->email = 'juanmaldonado@gmail.com';
        $user->document = '1073528451';
        $user->password = '$2a$12$Ei1cYD2/Wb71c2Y2DSnRXOyAia1Lzm.z5XpjedkbCs6141ES3NC7i'; // password
        $user->save();
    }
}
