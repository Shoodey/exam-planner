<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'     => "EL AMRI Ali",
                'email'    => "72241@aui.ma",
                'password' => bcrypt('230074'),
                'role_id'  => 1,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "KAFOU Fatiha",
                'email'    => "68976@aui.ma",
                'password' => bcrypt('uir'),
                'role_id'  => 3,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "ELABRIDI Ali",
                'email'    => "59967@aui.ma",
                'password' => bcrypt('spock'),
                'role_id'  => 3,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "TAHRI-SQALLI Mohammed",
                'email'    => "54320@aui.ma",
                'password' => bcrypt('robots'),
                'role_id'  => 3,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "LAMAAKEL Oumaima",
                'email'    => "56396@aui.ma",
                'password' => bcrypt('robotics'),
                'role_id'  => 3,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "ANZER Mohammed",
                'email'    => "65134@aui.ma",
                'password' => bcrypt('hci'),
                'role_id'  => 3,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name'     => "John DOE",
                'email'    => "00000@aui.ma",
                'password' => bcrypt('aui'),
                'role_id'  => 4,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            /*
             * SBA
             */
            [
                'name'     => "Abdelhamid ALAOUI HAMIDI",
                'email'    => "55088@aui.ma",
                'password' => bcrypt('aui'),
                'role_id'  => 4,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "Ghizlane HAMMOUD",
                'email'    => "13414@aui.ma",
                'password' => bcrypt('aui'),
                'role_id'  => 4,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            /*
             * SHSS
             */
            [
                'name'     => "Karim MOUSTAGHFIR",
                'email'    => "30678@aui.ma",
                'password' => bcrypt('aui'),
                'role_id'  => 4,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name'     => "Bouziane ZAID",
                'email'    => "30685@aui.ma",
                'password' => bcrypt('aui'),
                'role_id'  => 4,
                'created_by' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

//        factory(App\User::class, 3)->create();
    }
}
