<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Superuser']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Standard user']);

        Permission::create(['name' => 'Superuser Right']);
        Permission::create(['name' => 'Administration Right']);
        Permission::create(['name' => 'View Right']);
        Permission::create(['name' => 'Comment Right']);
        Permission::create(['name' => 'Edit Right']);
        Permission::create(['name' => 'Delete Right']);
    }
}
