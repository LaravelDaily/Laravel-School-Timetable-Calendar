<?php

use App\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'id' => 1,
                'name' => 'First class'
            ],
            [
                'id' => 2,
                'name' => 'Second class'
            ]
        ];

        SchoolClass::insert($classes);
    }
}
