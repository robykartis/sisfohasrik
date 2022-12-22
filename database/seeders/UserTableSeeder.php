<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [

            [
                'role' => 'superadmin',

                'name' => 'Super Admin',

                'email' => 'superadmin@mail.com',

                'type' => 0,

                'password' => bcrypt('12341234'),
                'image' => '001.jpg',

            ],

            [

                'role' => 'admin',

                'name' => 'Admin',

                'email' => 'admin@mail.com',

                'type' => 1,

                'password' => bcrypt('12341234'),
                'image' => '001.jpg',

            ],

            [

                'role' => 'operator',

                'name' => 'Operator',

                'email' => 'operator@mail.com',

                'type' => 2,

                'password' => bcrypt('12341234'),
                'image' => '001.jpg',

            ],
            [

                'role' => 'readonly',

                'name' => 'Read Only',

                'email' => 'readonly@mail.com',

                'type' => 3,

                'password' => bcrypt('12341234'),
                'image' => '001.jpg',

            ],

        ];



        foreach ($user as $key => $value) {

            User::create($value);
        }
    }
}
