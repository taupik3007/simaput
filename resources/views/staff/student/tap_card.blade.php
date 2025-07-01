@extends('staff.master')

@section('title', 'Daftarkan Kartu RFID Siswa')

@section('content')
    <style>
        .rfid-box {
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            box-shadow: 8px 8px 20px #d1d1d1, -8px -8px 20px #ffffff;
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            max-width: 500px;
            margin: auto;
            transition: all 0.3s ease;
        }

        .rfid-icon {
            font-size: 60px;
            color: #3f51b5;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); opacity: 0.7; }
        }

        .hidden-input {
            position: absolute;
            opacity: 0;
        }

        .success-text {
            font-weight: bold;
            color: green;
        }
    </style>

    <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="rfid-box">
            <i class="ti ti-credit-card rfid-icon"></i>
            <h3 class="mt-3 mb-2">Pendaftaran Kartu RFID</h3>
            <p class="text-muted">Arahkan kartu ke scanner untuk siswa berikut:</p>

            <h4 class="mb-1">{{ $student->user->name }}</h4>
            <p class="text-muted">NIS: {{ $student->std_nis }}</p>

            

            <form action="" method="POST" id="rfid-form">
                @csrf
                <input type="text" name="rfid_code" id="rfid" class="hidden-input" autocomplete="off" autofocus>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mendaftar Kartu',
                html: `kartu Sudah terdaftar`,
                confirmButtonText: 'OK'
            });
        </script>
    @endif
<script>
    const input = document.getElementById('rfid');
    input.focus();

    input.addEventListener('input', function () {
        if (this.value.length >= 10) {
            document.getElementById('rfid-form').submit();
        }
    });

    // Refocus setiap detik (biar gak ilang fokus)
    setInterval(() => {
        input.focus();
    }, 1000);
</script>

@endpush
