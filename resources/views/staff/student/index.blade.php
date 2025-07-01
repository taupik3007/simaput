@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput | Daftar Siswa
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">

                <p class="card-subtitle mb-3">

                </p>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Status Kartu</th>
                                <th>Aksi</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($student as $no => $student)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $student->std_nis }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td>{{ $student->user->email }}</td>
                                    <td>
                                        @if ($student->user->rfid_code == null)
                                            <span class="badge bg-danger px-3 py-2"> Belum
                                                Terdaftar</span>
                                        @else
                                            <span class="badge bg-success px-3 py-2"> Sudah
                                                Terdaftar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/staff/student/{{ $student->std_id }}/tap-card"
                                            class="btn btn-primary">Ganti Kartu</a>
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
                                <th>Email</th>
                                <th>Status Kartu</th>
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
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
@endpush
