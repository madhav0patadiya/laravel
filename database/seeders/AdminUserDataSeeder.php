<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminUserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Admin::create([
            'firstname'     => 'admin',
            'lastname'      => 'admin@gmail.com',
            'phone'         =>  1234567890,
            'email'         =>  'admin@gmail.com',
            'password'      =>  encreptIt('123456'),
            'allow_login'      =>  1,
            'type'          =>  1,
        ]);
    }
}
