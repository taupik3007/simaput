@extends('staff.master')

@section('title', 'Pengaturan Akses Rapor')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">📘 Pengaturan Akses Pengisian Rapor</h4>
            @if ($activeSemester->smt_name == 'ganjil')
                <form id="activate-semester-form" action="/staff/rapor-access/activate-semester" method="POST"
                    style="display: none;">
                    @csrf
                </form>

                <button type="button" class="btn btn-primary mb-3" onclick="confirmActivate()">Aktivasi Semester
                    Genap</button>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Status Aktif</th>
                            <th>Akses Pengisian Rapor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semesters as $no => $smt)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $smt->smt_name }}</td>
                                <td>{{ $smt->academicYear->acy_starting_year }} / {{ $smt->academicYear->acy_year_over }}
                                </td>
                                <td>
                                    <span class="badge bg-{{ $smt->smt_status == 1 ? 'success' : 'secondary' }}">
                                        {{ $smt->smt_status == 1 ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $smt->smt_report_status == 1 ? 'primary' : 'danger' }}">
                                        {{ $smt->smt_report_status == 1 ? 'Dibuka' : 'Ditutup' }}
                                    </span>
                                </td>
                                <td>
                                    @if ($smt->smt_status == 1)
                                        <form action="{{ route('staff.semester.toggle-rapor', $smt->smt_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-{{ $smt->smt_report_status == 1 ? 'danger' : 'success' }}">
                                                {{ $smt->smt_report_status == 1 ? 'Tutup Akses' : 'Buka Akses' }}
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    

@endsection

@push('script')
<script>
    function confirmActivate() {
        Swal.fire({
            title: 'Aktivasi Semester Genap?',
            text: "Data semester yang aktif akan berubah!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, aktifkan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('activate-semester-form').submit();
            }
        });
    }
</script>
@endpush