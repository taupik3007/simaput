@extends('student.master')

@push('link')
    
@endpush

@section('title')
    SiMaput | Daftar Kelas
@endsection

@section('content')
    <div class="col-lg-8 d-flex align-items-stretch">
  <div class="card w-100 shadow-sm rounded-3">
    <div class="card-body">
      <div class="d-sm-flex d-block align-items-center justify-content-between mb-4">
        <div class="mb-3 mb-sm-0">
          <h4 class="card-title fw-semibold mb-1">Presensi Hari Ini</h4>
          <span class="text-muted small">Status kehadiran kamu untuk tanggal {{ \Carbon\Carbon::today()->format('d M Y') }}</span>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col-md-4 text-center">
          <div class="p-3 rounded bg-light-primary text-primary">
            <i class="ti ti-calendar-check fs-1"></i>
            <h5 class="mt-3 mb-1 fw-bold">
              @if ($presence)
                {{ ucfirst($presence->att_status) }}
              @else
                Belum Absen
              @endif
            </h5>
            <small class="text-muted">
              @if ($presence)
                Absen pada {{ \Carbon\Carbon::parse($presence->att_check_in)->format('H:i') }} WIB
              @else
                Silakan lakukan presensi
              @endif
            </small>
          </div>
        </div>

        <div class="col-md-8">
          <div class="alert alert-{{ $presence ? 'success' : 'warning' }} mt-3 mt-md-0">
            @if ($presence)
              ✅ Kamu sudah melakukan presensi hari ini.
            @else
              ⚠️ Kamu belum melakukan presensi hari ini.
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection



@push('script')
    
@endpush
