@extends('teacher.master')

@section('title', 'Jadwal Pelajaran')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Jadwal Pelajaran Saya</h4>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($days as $day)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if ($loop->first) active @endif" id="pills-{{ strtolower($day) }}-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-{{ strtolower($day) }}" type="button"
                            role="tab" aria-controls="pills-{{ strtolower($day) }}"
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
                        @php
                            $filtered = $schs->filter(fn($sch) => $sch->slot && $sch->slot->schs_day === $day)
                                ->sortBy(fn($sch) => $sch->slot->schs_order);
                        @endphp

                        @if ($filtered->isEmpty())
                            <div class="alert alert-info text-center">Tidak ada jadwal untuk hari {{ $day }}.</div>
                        @else
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th width="10%">Jam Ke</th>
                                        <th width="30%">Waktu</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filtered as $sch)
                                        <tr>
                                            <td>{{ $sch->slot->schs_order }}</td>
                                            <td>{{ $sch->slot->schs_start_time }} - {{ $sch->slot->schs_end_time }}</td>
                                            <td>{{ $sch->teachingAssignment->subject->subj_name ?? '-' }}</td>
                                            <td>{{ $sch->teachingAssignment->class->cls_level." ".$sch->teachingAssignment->class->cls_major->mjr_prefix." ".$sch->teachingAssignment->class->cls_number ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
