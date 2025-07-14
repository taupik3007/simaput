@extends('teacher.master')

@section('title', 'Tambah Presensi')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">📌 Tambah Presensi</h4>

        <form action="" method="POST">
            @csrf

            <input type="hidden" name="satd_teaching_id" value="{{ $teaching->teach_id }}">

            <div class="mb-3">
                <label class="form-label">Tanggal Presensi</label>
                <input type="date" name="satd_date" class="form-control" readonly value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Topik Pelajaran (Opsional)</label>
                <input type="text" name="satd_topic" class="form-control" placeholder="Contoh: Materi Bab 3">
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
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $student->std_nis }}</td>
                                <td>{{ $student->user->name }}</td>

                                @foreach ([1, 2, 3, 4] as $status)
                                    <td class="text-center">
                                        <input type="radio" name="presensi[{{ $student->std_id }}]" value="{{ $status }}"
                                           >
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="ti ti-check"></i> Simpan Presensi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
