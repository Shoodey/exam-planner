<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            /*
             * SBA
             */
            [
                'code'       => "FIN 3301",
                'name'       => "Principles of Finance",
                'school_id'  => 1,
                'created_by' => 1
            ],
            [
                'code'       => "FIN 4306",
                'name'       => "Financial Investments",
                'school_id'  => 1,
                'created_by' => 1
            ],

            [
                'code'       => "ECO 1300",
                'name'       => "Introduction to Economics",
                'school_id'  => 1,
                'created_by' => 1
            ],
            [
                'code'       => "ECO 2301",
                'name'       => "Microeconomics",
                'school_id'  => 1,
                'created_by' => 1
            ],

            /*
             * SHSS
             */
            [
                'code'       => "HRD 3401",
                'name'       => "Human Capital Management",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "HRD 4304",
                'name'       => "Consulting for HRD",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "HRD 5201",
                'name'       => "Bus. Environment and Ethics for HRD",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "SSC 4000",
                'name'       => "Senior Capstone I for COM/HRD",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "SSC 4003",
                'name'       => "Senior Capstone II for COM/HRD",
                'school_id'  => 2,
                'created_by' => 1
            ],

            [
                'code'       => "COM 1302",
                'name'       => "Introduction To Mass Communication",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "COM 1304",
                'name'       => "New Media Technology",
                'school_id'  => 2,
                'created_by' => 1
            ],
            [
                'code'       => "COM 4304",
                'name'       => "Communication and Development",
                'school_id'  => 2,
                'created_by' => 1
            ],
        ]);
    }
}
