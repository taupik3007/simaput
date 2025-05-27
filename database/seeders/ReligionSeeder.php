<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Religion;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $createReligion = Religion::insert([
    ['rlg_name' => 'Islam'],
    ['rlg_name' => 'Protestan'],
    ['rlg_name' => 'Katolik'],
    ['rlg_name' => 'Hindu'],
    ['rlg_name' => 'Buddha'],
    ['rlg_name' => 'Konghucu'],
]);
    }
}
