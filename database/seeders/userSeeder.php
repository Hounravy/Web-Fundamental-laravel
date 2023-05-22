<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Ravy Houn',
                'email' => 'ravy@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Testing',
                'email' => 'test@gmail.com',
                'password' => Hash::make('password'),
            ]
            
           ];
           foreach($userData as $record)
            {
               User::create($record);
            }
    }
}
