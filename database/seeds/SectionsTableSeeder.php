<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            /*
             * FIN 3301 - Principles of Finance
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 1,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 1,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "03",
                'user_id'         => 7,
                'course_id'       => 1,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "04",
                'user_id'         => 7,
                'course_id'       => 1,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "05",
                'user_id'         => 8,
                'course_id'       => 1,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * FIN 4306 - Financial Investments
             */
            [
                'code'            => "01",
                'user_id'         => 8,
                'course_id'       => 2,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 2,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * ECO 1300 - Introduction to Economics
             */
            [
                'code'            => "01",
                'user_id'         => 9,
                'course_id'       => 3,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 3,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * ECO 2301 - Microeconomics
             */
            [
                'code'            => "01",
                'user_id'         => 9,
                'course_id'       => 4,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 9,
                'course_id'       => 4,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "03",
                'user_id'         => 7,
                'course_id'       => 4,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "04",
                'user_id'         => 7,
                'course_id'       => 4,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "05",
                'user_id'         => 9,
                'course_id'       => 4,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * HRD 3401 - Human Capital Management
             */
            [
                'code'            => "01",
                'user_id'         => 10,
                'course_id'       => 5,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 5,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * HRD 4304 - Consulting for HRD
             */
            [
                'code'            => "01",
                'user_id'         => 10,
                'course_id'       => 6,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 6,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * HRD 5201 - Bus. Environment and Ethics for HRD
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 7,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "05",
                'user_id'         => 7,
                'course_id'       => 7,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "08",
                'user_id'         => 7,
                'course_id'       => 7,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "11",
                'user_id'         => 10,
                'course_id'       => 7,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * SSC 4000 - Senior Capstone I for COM/HRD
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 8,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 11,
                'course_id'       => 8,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "03",
                'user_id'         => 10,
                'course_id'       => 8,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * SSC 4003 - Senior Capstone II for COM/HRD
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 9,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 11,
                'course_id'       => 9,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "03",
                'user_id'         => 10,
                'course_id'       => 9,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * COM 1302 - Introduction To Mass Communication
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 10,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 11,
                'course_id'       => 10,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             * COM 1304 - New Media Technology
             */
            [
                'code'            => "01",
                'user_id'         => 7,
                'course_id'       => 11,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 11,
                'course_id'       => 11,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02 H",
                'user_id'         => 11,
                'course_id'       => 11,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            /*
             *  COM 4304 - Communication and Development
             */
            [
                'code'            => "01",
                'user_id'         => 11,
                'course_id'       => 12,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 12,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],


            /*
             * VEsNA
             */
            [
                'code'            => "01",
                'user_id'         => 13,
                'course_id'       => 13,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 13,
                'course_id'       => 13,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "03",
                'user_id'         => 13,
                'course_id'       => 13,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            [
                'code'            => "01",
                'user_id'         => 13,
                'course_id'       => 14,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 14,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],

            [
                'code'            => "01",
                'user_id'         => 13,
                'course_id'       => 15,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
            [
                'code'            => "02",
                'user_id'         => 7,
                'course_id'       => 15,
                'students_number' => rand(10, 50),
                'created_by'      => 1
            ],
        ]);
    }
}
