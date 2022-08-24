<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email' => 'superadmin@gmail.com',
            'username' => 'SuperAdmin',
            'password' => bcrypt('12345678'),
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone_number' => '088888888888',
            'division' => 'Iklan',
        ]);
    }
}
