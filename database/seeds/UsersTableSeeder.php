<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'        => 'Darryl Goodrich',
            'username'    => 'darryl',
            'email'       => 'darryl_goodrich@yahoo.com',
            'password'    => bcrypt('secret'),
            'dob'         => '1986-06-19',
            'gender'      => 'male',
        ]);

        $user->assignRole('Superuser');

        $user = User::create([
            'name'        => 'Nicole Goodrich',
            'username'    => 'nicole',
            'email'       => 'admin2@admin.com',
            'password'    => bcrypt('secret'),
            'dob'         => '1986-06-16',
            'gender'      => 'female',
        ]);

        $user->assignRole('Admin');

        $user = User::create([
            'name'        => 'Brody Goodrich',
            'username'    => 'brody',
            'email'       => 'admin1@admin.com',
            'password'    => bcrypt('secret'),
            'dob'         => '2015-04-29',
            'gender'      => 'male',
        ]);

        $user->assignRole('Standard User');
    }
}
