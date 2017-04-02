<?php

use Illuminate\Database\Seeder;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            [
                'name'  => "School of Business Administration",
                'slug'  => "SBA"
            ],
            [
                'name'  => "School of Humanities & Social Sciences",
                'slug'  => "SHSS"
            ],
            [
                'name'  => "School of Science and Engineering",
                'slug'  => "SSE"
            ],
            [
                'name'  => "Language Center",
                'slug'  => "LC"
            ]
        ]);
    }
}
