@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput | Daftar Jurusan
@endsection

@section('content')
    <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="dayTabs" role="tablist">
            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'] as $day)
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3
                {{ $loop->first ? 'active' : '' }}"
                        id="tab-{{ strtolower($day) }}" data-bs-toggle="pill"
                        data-bs-target="#content-{{ strtolower($day) }}" type="button" role="tab"
                        aria-controls="content-{{ strtolower($day) }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        <i class="ti ti-calendar-event me-2 fs-6"></i>
                        <span class="d-none d-md-block">{{ $day }}</span>
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="card-body">
            <div class="tab-content pt-4" id="dayTabsContent">
                @foreach ($slotsPerDay as $day => $slots)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ strtolower($day) }}"
                        role="tabpanel" aria-labelledby="tab-{{ strtolower($day) }}">
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Jam Ke</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Aksi</th> {{-- Tambah kolom aksi --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slots as $slot)
                                        <tr>
                                            <td>{{ $slot->schs_order }}</td>
                                            <td>{{ \Carbon\Carbon::parse($slot->schs_start_time)->format('H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($slot->schs_end_time)->format('H:i') }}</td>
                                            <td>
                                                <a href=""
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="ti ti-pencil"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



@push('script')
@endpush
