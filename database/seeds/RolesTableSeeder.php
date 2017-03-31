<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name'  => "Administrator",
                'slug'  => "admin"
            ],
            [
                'name'  => "Faculty Member",
                'slug'  => "faculty_member"
            ],
            [
                'name'  => "Regitration Office",
                'slug'  => "registration_office"
            ]
        );
    }
}