<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'user',
            'level' => '1'
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
            'level' => '2'
        ]);
        DB::table('roles')->insert([
            'name' => 'super_admin',
            'level' => '3'
        ]);
    }
}
