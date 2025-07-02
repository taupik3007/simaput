<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\User;

class PrecenseController extends Controller
{
    public function index(){
         $today = Carbon::today();
        $time = Carbon::now()->format('H:i');

        // Ambil 4 presensi terbaru hari ini
        $recentAttendances = Attendance::with('user')
            ->whereDate('att_date', $today)
            ->latest('att_date')
            ->take(4)
            ->get();

       
        return view('precense.attendence.precense',compact('today', 'time', 'recentAttendances'));
    }
    public function store(request $request){
         $request->validate([
        'rfid_code' => 'required|max:255',
    ]);

    $user = User::where('rfid_code', $request->rfid_code)->first();

    if (!$user) {
        return redirect('/precense')->with('error', 'Kartu tidak dikenal!');
    }

    $today = Carbon::today();
    $now = Carbon::now();
    $noon = Carbon::createFromTimeString('12:00:00');

    $attendance = Attendance::where('att_user_id', $user->usr_id)
        ->whereDate('att_date', $today)
        ->first();
        // dd($attendance);
    $number = 0;
    if ($attendance == null) {
        $number = $number+1;
        // dd($number);
       $createAttendance =  Attendance::create([
            'att_user_id'    => $user->usr_id,
            'att_date'       => $today,
            'att_check_in'   => $now,
            'att_created_at' => now(),
        ]);
        
        
        
    }

    // dd($number);
    if($number == 1){
    // dd($number);
        
        return redirect('/precense');
    }
    // dd($number);

if (is_null($attendance->att_check_out)) {
    // dd($number);
        if ($now->lessThan($noon)) {
            // dd()
            return redirect('/precense')->with('error', 'Belum waktunya pulang. Hanya bisa setelah jam 12 siang.');
        }
//    dd("gg");
        $attendance->att_check_out = $now;
        $attendance->att_updated_at = now();
        $attendance->save();

        return redirect('/precense')->with('success', "{$user->name} berhasil presensi pulang.");
    }
    // Sudah masuk, cek apakah boleh keluar
   
    return redirect('/precense')->with('info', "{$user->name} sudah presensi masuk dan pulang hari ini.");
    }
}
