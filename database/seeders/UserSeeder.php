<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // 0 = Admin
        // 1 = User

        User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            'role' => 0,
            "password" => Hash::make("password")
        ]);
    }
}
