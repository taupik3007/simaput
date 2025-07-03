<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role = Role::create(['name' => 'staff']);
        $role = Role::create(['name' => 'student']);
        $role = Role::create(['name' => 'teacher']);
        $permission = Permission::create(['name'=> 'homeroom']);
        $permission = Permission::create(['name'=> 'curriculum']);
        $permission = Permission::create(['name'=> 'prospective student']);




    }
}
