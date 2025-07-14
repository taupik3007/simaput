@extends('teacher.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput | Mata Pelajaran
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    {{-- <h4 class="card-title mb-0">Daftar Module {{ $assignment->subject->subj_name }} --}}
                        <a href="/teacher/subject/{{ $id }}/presence/create"
                            class="btn btn-primary position-absolute top-0 end-0">Tambah Presensi</a>

                </div>

                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>

                               
                                <th>Tanggal Presensi</th>
                                <th>Aksi</th>



                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($presence as $no => $presence)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($presence->satd_date)->translatedFormat('l, d F Y ') }}</td>
                                    {{-- <td> {{ \Carbon\Carbon::parse($assignment->asg_due_date)->translatedFormat('l, d F Y H:i') }}</td> --}}
                                    <td>
                                        <a href="/teacher/subject/{{$presence->satd_id}}/presence/edit"
                                            class="btn btn-primary">
                                             Detail presensi
                                        </a>
                                        



                                    </td>

                                </tr>
                            @endforeach
                            <!-- end row -->

                        </tbody>
                        <tfoot>
                            <!-- start row -->


                            <tr>
                                <th width="10%">No</th>

                                
                                <th>Tanggal Presensi</th>
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
