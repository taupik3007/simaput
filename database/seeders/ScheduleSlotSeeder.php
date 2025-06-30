<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScheduleSlot;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ScheduleSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $baseStartTime = Carbon::createFromTime(7, 0); // mulai jam 07:00
        $durationMinutes = 40;
        $userId = 1; // ganti sesuai usr_id kamu

        foreach ($days as $day) {
            $currentTime = $baseStartTime->copy();
            $jamPelajaran = 1;

            while ($jamPelajaran <= 11) {
                // Istirahat pagi jam 09:00 selama 20 menit
                if ($currentTime->format('H:i') === '09:00') {
                    $currentTime->addMinutes(20);
                    continue;
                }

                // Istirahat siang jam 12:00
                if ($currentTime->format('H:i') === '12:00') {
                    $breakMinutes = ($day === 'Jumat') ? 60 : 30;
                    $currentTime->addMinutes($breakMinutes);
                    continue;
                }

                // Simpan jadwal pelajaran
                ScheduleSlot::create([
                    'schs_day'         => $day,
                    'schs_order'       => $jamPelajaran,
                    'schs_start_time'  => $currentTime->format('H:i:s'),
                    'schs_end_time'    => $currentTime->copy()->addMinutes($durationMinutes)->format('H:i:s'),
                    'schs_created_by'  => $userId,
                    'schs_updated_by'  => $userId,
                    'schs_sys_note'    => 'Seeder default 11 jam + istirahat',
                ]);

                // Geser waktu & naikkan jam pelajaran
                $currentTime->addMinutes($durationMinutes);
                $jamPelajaran++;
            }
        }
    }
}
