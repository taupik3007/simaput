<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class FullStudentSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role 'student' kalau belum ada
        Role::firstOrCreate(['name' => 'student']);

        // Insert Tahun Akademik
        DB::table('academic_years')->insert([
            'acy_starting_year' => 2025,
            'acy_year_over'     => 2026,
            'acy_status'        => 1,
            'acy_created_by'    => 1,
            'acy_created_at'    => now(),
            'acy_updated_at'    => now(),
        ]);

        // Insert Jalur Penerimaan
        DB::table('student_admissions')->insert([
    'sta_academicy_id' => 1,
    'sta_start'        => now()->subMonths(2)->startOfMonth(),   // contoh: 1 Mei 2025
    'sta_ended'        => now()->subMonth()->endOfMonth(),       // contoh: 30 Juni 2025
    'sta_created_by'   => 1,
    'sta_created_at'   => now(),
    'sta_updated_at'   => now(),
]);
        DB::table('semesters')->insert([
            'smt_academic_year_id' => 1,
            'smt_name' => "ganjil",
            'smt_status' => 1
        ]);
        DB::table('semesters')->insert([
            'smt_academic_year_id' => 1,
            'smt_name' => "genap"
        ]);

        // Insert Jurusan
        $majors = [
            ['mjr_name' => 'IPA', 'mjr_prefix' => 'IPA'],
            ['mjr_name' => 'IPS', 'mjr_prefix' => 'IPS'],
        ];

        foreach ($majors as $major) {
            DB::table('majors')->insert([
                'mjr_name'        => $major['mjr_name'],
                'mjr_prefix'      => $major['mjr_prefix'],
                'mjr_created_by'  => 1,
                'mjr_created_at'  => now(),
                'mjr_updated_at'  => now(),
            ]);
        }

        // Setup Counter
        $globalUserId = 1;
        $globalNIS = 1;
        $cls_id = 1;

        for ($major_id = 1; $major_id <= 2; $major_id++) {
            for ($class_num = 1; $class_num <= 2; $class_num++) {

                // Insert kelas
                DB::table('classes')->insert([
                    'cls_level'         => 'X',
                    'cls_major_id'      => $major_id,
                    'cls_number'        => $class_num,
                    'cls_academicy_id'  => 1,
                    'cls_created_by'    => 1,
                    'cls_created_at'    => now(),
                    'cls_updated_at'    => now(),
                ]);

                // Insert siswa
                for ($i = 1; $i <= 20; $i++) {
                    // Buat user
                    $user = User::create([
                        'usr_nik'          => 1000000000000000 + $globalUserId,
                        'name'             => "Siswa_{$major_id}_{$class_num}_{$i}",
                        'email'            => "siswa{$globalUserId}@mail.com",
                        'password'         => Hash::make('password'),
                        'usr_status'       => 1,
                        'usr_created_by'   => 1,
                        'usr_created_at'   => now(),
                        'usr_updated_at'   => now(),
                    ]);

                    $user->assignRole('student');

                    // Registrasi PPDB
                    DB::table('student_admission_registration')->insert([
                        'sar_user_id'               => $user->usr_id,
                        'sar_student_admission_id'  => 1,
                        'sar_major_id'              => $major_id,
                        'sar_status'                => 2,
                        'sar_created_by'            => 1,
                        'sar_created_at'            => now(),
                        'sar_updated_at'            => now(),
                    ]);

                    // Insert siswa
                    DB::table('students')->insert([
                        'std_user_id'     => $user->usr_id,
                        'std_class_id'    => $cls_id,
                        'std_nis'         => '2526.10.' . str_pad($globalNIS++, 2, '0', STR_PAD_LEFT),
                        'std_nisn'        => '2025' . str_pad($globalUserId, 5, '0', STR_PAD_LEFT),
                        'std_created_by'  => 1,
                        'std_created_at'  => now(),
                        'std_updated_at'  => now(),
                    ]);

                    $globalUserId++;
                }

                $cls_id++;
            }
        }
    }
}
