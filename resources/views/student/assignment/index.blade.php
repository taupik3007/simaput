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
                        <a href="/teacher/subject/{{ $id }}/assignment/create"
                            class="btn btn-primary position-absolute top-0 end-0">Tambah Module</a>

                </div>

                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>

                                <th>Nama Tugas</th>
                                <th>Tanggal pengumpulan</th>
                                <th>Aksi</th>



                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($assignment as $no => $assignment)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $assignment->asg_title }}</td>
                                    <td> {{ \Carbon\Carbon::parse($assignment->asg_due_date)->translatedFormat('l, d F Y H:i') }}</td>
                                    <td>
                                       
                                        <a href="/student/assignments/{{$assignment->asg_id}}/submit"
                                            class="btn btn-primary">
                                             Jawab
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

                                <th>Nama Tugas</th>
                                <th>Tanggal pengumpulan</th>
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
