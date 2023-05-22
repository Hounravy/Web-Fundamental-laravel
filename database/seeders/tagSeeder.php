<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tag;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $tagData = [
        [
            'name' => 'HTML'
        ],
        [
            'name' => 'CSS'
        ],
        [
            'name' => 'PHP'
        ],
        [
            'name' => 'JAVA'
        ]
       ];
       foreach($tagData as $record)
        {
           tag::create($record);
        }
    }
}
