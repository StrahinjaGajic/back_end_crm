<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = array(
            array('name' => 'Technical'),
            array('name' => 'Furniture'),
            array('name' => 'Walls')
        );

        DB::table('categories')->insert($categories);
    }
}
