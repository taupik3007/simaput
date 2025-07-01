@extends('precense.master')

@section('title', 'Presensi Hari Ini')

@section('content')
    <style>
        .time-date-box {
            text-align: center;
            margin-bottom: 30px;
        }
     
    .hidden-input {
        position: absolute !important;
        height: 1px; width: 1px;
        overflow: hidden;
        clip: rect(1px, 1px, 1px, 1px);
        white-space: nowrap;
    }


        .time-date-box h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .time-date-box p {
            font-size: 1.5rem;
            color: #666;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .student-card {
            background: linear-gradient(135deg, #f0f4ff, #ffffff);
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-radius: 16px;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .student-card:hover {
            transform: translateY(-5px);
        }

        .student-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .student-name {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .student-nis {
            font-size: 1rem;
            color: #777;
        }

        .student-time {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #999;
        }

        .empty-card {
            background: #f8f8f8;
            color: #bbb;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>

    <div class="time-date-box">
        <h1>{{ now()->format('H:i') }}</h1>
        <p>{{ now()->translatedFormat('l, d F Y') }}</p>
    </div>

    <div class="card-grid">
        @foreach ($recentAttendances as $attendance)
            <div class="student-card text-center">
                <img src="{{ $attendance->user->profile_photo_url ?? asset('assets/images/avatar/default.png') }}"
                     class="student-avatar" alt="Avatar">
                <div class="student-name">{{ $attendance->user->name }}</div>
                <div class="student-nis">NIS: {{ $attendance->user->student->std_nis ?? '-' }}</div>
                <div class="student-time">Presensi: {{ \Carbon\Carbon::parse($attendance->att_time)->format('H:i') }}</div>
            </div>
        @endforeach

        {{-- Tambahan jika kurang dari 4 --}}
        @for ($i = $recentAttendances->count(); $i < 4; $i++)
            <div class="student-card text-center empty-card">
                <i class="ti ti-user fs-1 mb-2"></i>
                <div class="student-name">Belum Ada</div>
                <div class="student-nis">Menunggu Tap</div>
            </div>
        @endfor
    </div>
    <form action="" method="POST" id="tap-form">
    @csrf
    <input type="text" name="rfid_code" id="rfid" class="form-control text-center fs-3 hidden-input"
           placeholder="Tempelkan Kartu di Scanner..." autocomplete="off" autofocus
           style="max-width: 500px; margin: 30px auto; display: block;">
</form>
@push('script')
<script>
    const input = document.getElementById('rfid');
    input.focus();

    input.addEventListener('input', function () {
        if (this.value.length >= 10) {
            document.getElementById('tap-form').submit();
        }
    });

    setInterval(() => {
        input.focus();
    }, 1000);
</script>
@endpush
@endsection
