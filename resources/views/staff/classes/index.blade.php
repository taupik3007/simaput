@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput | Daftar Kelas
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    <h4 class="card-title mb-0">Daftar Kelas</h4>
                    {{-- <a href="/staff/classes/create" class="btn btn-primary position-absolute top-0 end-0">Tambah Kelas</a> --}}
                </div>
                <p class="card-subtitle mb-3">
                    
                </p>
                <div class="table-responsive">
                    <table id="zero_config" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>
                                <th>Tingkatan</th>
                                <th>Jurusan</th>
                                <th>Nomor</th>
                                <th>Wali Kelas</th>
                                <th>Aksi</th>
                                
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($classes as $no=>$classes)
                            <tr>
                                
                                <td>{{$no+1}}</td>
                                <td>{{$classes->cls_level}}</td>
                                <td>{{$classes->cls_major->mjr_prefix}}</td>
                                <td>{{$classes->cls_number}}</td>
                                @if($classes->cls_homeroom_id != null )
                                <td>{{$classes->cls_homeroom->name}}</td>
                                @else
                                <td></td>
                                @endif
                                
                                <td>
                                    @if(auth()->user()->can('curriculum'))
                                     <a href="/staff/classes/{{$classes->cls_id}}/schedule" class="btn btn-success">Penjadwalan Mapel </a>
                                    @endif
                                    <a href="/staff/classes/{{$classes->cls_id}}/homeroom/edit" class="btn btn-primary">Wali kelas</a><br>
                                    <a href="/staff/classes/{{$classes->cls_id}}/student" class="btn btn-info">Daftar Siswa</a> 
                                     {{-- <a href="/staff/classes/{{$classes->cls_id}}/edit" class="btn btn-primary">Edit</a> --}}
                                     <a href="/staff/classes/{{$classes->cls_id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                     

                                </td>


                                
                            </tr>
                            @endforeach
                            <!-- end row -->
                            
                        </tbody>
                        <tfoot>
                            <!-- start row -->
                            

                            <tr>
                                <th width="10%">No</th>
                                <th>Tingkatan</th>
                                <th>Jurusan</th>
                                <th>Nomor</th>
                                <th>Wali Kelas</th>
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

    <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>

@endpush
