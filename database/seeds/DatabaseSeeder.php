<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(RoleSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(UserRolePivotSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
