<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use App\Models\Designation;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'usertype' => 'adm',
            'firstname' => 'admin',
            'middlename' => '',
            'lastname' => '',
            'sex' => 'male',
            'civil_status' => 'single',
            'phone' => '09664250790',
            'email' => 'admin@gmail.com',
        ]);

        // --------------------------------------------

        $this->fake_personnels();

        $this->fake_alumni();
    }

    public function fake_personnels()
    {
        $users = User::factory(40)->create([
            'usertype' => 'prsnl',
        ]);

        $designations = Designation::get();

        $campuses = Campus::get();
        $colleges = College::get();
        $programs = Program::get();

        if ( !isset($users, $designations, $campuses, $colleges, $programs) ) {
            return;
        }

        foreach ($users as $user) {
            $designation = $designations->random();

            $data = [
                'designation_id' => $designation->id,
            ];

            switch ($designation->access) {
                case 'campus':
                    $data['campus_id'] = $campuses->random()->id;
                    break;
                case 'college':
                    $data['college_id'] = $colleges->random()->id;
                    break;
                case 'program':
                    $data['program_id'] = $programs->random()->id;
                    break;
            }

            $user->user_designations()->create($data);
        }
    }

    public function fake_alumni()
    {
        User::factory()->create([
            'usertype' => 'alum',
            'email' => 'alumni@gmail.com',
        ]);

        User::factory(10)->create([
            'usertype' => 'alum',
        ]);
    }
}
