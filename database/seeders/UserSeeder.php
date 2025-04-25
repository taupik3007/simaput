<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'taupik@gmail.com',
            'password' => bcrypt('gararetek44'),
            'name'  => 'gararetek',

        ]);
        $user->assignRole('staff');

        $user = User::create([
            'email' => 'taupik2@gmail.com',
            'password' => bcrypt('gararetek44'),
            'name'  => 'gararetek',

        ]);
        $user->assignRole('student');
    }
}
