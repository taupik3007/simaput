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
        <div class="card-body">
            <h4 class="card-title mb-3">
                Penjadwalan Kelas: {{ $class->cls_level }} {{ $class->cls_major->mjr_name }} {{ $class->cls_number }}
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

                        <form action="/staff/classes/{{$class->cls_id}}/schedule/{{$day}}/update" method="POST">
                            @csrf
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
                                                <select name="schedules[{{ $slot->schs_id }}]" class="form-select select2">
                                                    <option value="">-- Pilih Mapel & Guru --</option>
                                                    @foreach ($class->teachingAssignments as $assign)
                                                        <option value="{{ $assign->teach_id }}"
                                                             @if (isset($slot->schedule) && $slot->schedule->sch_teaching_id == $assign->teach_id) selected @endif>
                                                            {{ $assign->subject->subj_name }} -
                                                            {{ $assign->teacher->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-success">
                                    <i class="ti ti-device-floppy me-1"></i> Simpan Jadwal {{ $day }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



@push('script')
@endpush
