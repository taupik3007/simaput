@extends('student.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('title')
    SiMaput | Lihat Rapor {{ $student->user->name }}
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <h4 class="card-title mb-0">📄 Daftar Rapor - {{ $student->user->name }}</h4>
            </div>

            <div class="table-responsive">
                <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                    <thead>
                        <tr class="text-center">
                            <th width="10%">No</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semesters as $i => $semester)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $semester->rpc_level }}</td>
                            <td>{{ $semester->semesters->smt_name }}</td>
                            <td class="text-center">
                                <a href="{{ url('student/' . $student->std_id . '/report/detail?semester=' . $semester->semesters->smt_id) }}" 
                                   class="btn btn-sm btn-primary">
                                     Info
                                </a>
                                <a href="{{ url('student/' . $student->std_id . '/report/download?semester=' . $semester->semesters->smt_id) }}" 
                                   class="btn btn-sm btn-primary">
                                     Download
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
@endpush
