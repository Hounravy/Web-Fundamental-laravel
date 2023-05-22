<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catData = [
            [
                'name' => 'Mobile Devlopment'
            ],
            [
                'name' => 'WEB Development'
            ],
            [
                'name' => 'Software Development'
            ],
            [
                'name' => 'DevOps'
            ]
           ];
           foreach($catData as $record)
            {
               category::create($record);
            }
    }
}
