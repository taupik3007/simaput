<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\major;


class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        major::create([
            'mjr_name'      =>  "rekayasa perangkat Lunak",
            'mjr_prefix'    =>  "RPL",
        ]);
    }
}
