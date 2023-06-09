<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'id' => 1,
            'id_role' => 1,
            'nama_lengkap' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('123')
        ]);
    }
}
