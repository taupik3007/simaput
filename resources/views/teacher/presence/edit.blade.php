@extends('teacher.master')

@section('title', 'Edit Presensi')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">✏️ Edit Presensi</h4>

            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Tanggal Presensi</label>
                    <input type="date" name="satd_date" class="form-control" value="{{ $attendance->satd_date }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Topik Pelajaran (Opsional)</label>
                    <input type="text" name="satd_topic" class="form-control" value="{{ $attendance->satd_topic }}">
                </div>

                <hr class="my-4">
                <h5>📋 Daftar Siswa</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th class="text-center">Hadir</th>
                                <th class="text-center">Izin</th>
                                <th class="text-center">Sakit</th>
                                <th class="text-center">Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $i => $student)
                                @php
                                    $detail = $existingDetails[$student->std_id] ?? null;
                                    $current = $detail->sadt_status ?? null;
                                @endphp
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $student->std_nis }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    @for ($status = 1; $status <= 4; $status++)
                                        <td class="text-center">
                                            <input type="radio" name="presensi[{{ $student->std_id }}]"
                                                value="{{ $status }}" {{ $current === $status ? 'checked' : '' }}>
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">
                        <i class="ti ti-refresh"></i> Perbarui Presensi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
