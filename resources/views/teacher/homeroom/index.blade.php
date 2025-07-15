@extends('teacher.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput |  {{ $classes->cls_level . ' ' . $classes->cls_major->mjr_name . ' ' . $classes->cls_number }}
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    <h4 class="card-title mb-0">Daftar Siswa
                        {{ $classes->cls_level . ' ' . $classes->cls_major->mjr_name . ' ' . $classes->cls_number }}
                </div>
                <div class="d-flex align-items-center mt-1 text-muted small">
                    <i class="ti ti-user me-1"></i> Wali Kelas:
                    <span class="badge bg-light text-dark ms-2 fw-semibold">{{ $classes->cls_homeroom->name?? "" }}</span>
                </div>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>

                                <th>NIS</th>
                                <th>nama</th>
                                <th>Aksi</th>



                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($classes->students as $no => $student)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $student->std_nis }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td>
                                        <a href="/teacher/student/{{$student->std_id}}/report" class="btn btn-primary">Rapor</a>
                                    </td>

                                </tr>
                            @endforeach
                            <!-- end row -->

                        </tbody>
                        <tfoot>
                            <!-- start row -->


                            <tr>
                                <th width="10%">No</th>

                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Aksi</th>




                            </tr>
                            <!-- end row -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('script')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script> --}}

    <script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
@endpush
