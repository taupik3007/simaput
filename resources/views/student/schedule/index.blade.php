@extends('student.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('title')
    SiMaput | Jadwal Pelajaran
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">
                Jadwal Pelajaran: 
            </h4>

            <!-- Nav Pills -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($days as $key => $day)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if ($loop->first) active @endif"
                            id="pills-{{ strtolower($day) }}-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-{{ strtolower($day) }}" type="button" role="tab"
                            aria-controls="pills-{{ strtolower($day) }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $day }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content" id="pills-tabContent">
                @foreach ($days as $day)
                    <div class="tab-pane fade @if ($loop->first) show active @endif"
                        id="pills-{{ strtolower($day) }}" role="tabpanel"
                        aria-labelledby="pills-{{ strtolower($day) }}-tab" tabindex="0">

                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="10%">Jam ke</th>
                                    <th width="30%">Waktu</th>
                                    <th>Mata Pelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schs->where('schs_day', $day) as $slot)
                                    <tr>
                                        <td>{{ $slot->schs_order }}</td>
                                        <td>{{ $slot->schs_start_time }} - {{ $slot->schs_end_time }}</td>
                                        <td>
                                            @if ($slot->schedule)
                                                {{ $slot->schedule->teachingAssignment->subject->subj_name }}
                                                - {{ $slot->schedule->teachingAssignment->teacher->name }}
                                            @else
                                                <span class="text-muted">Tidak ada jadwal</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
