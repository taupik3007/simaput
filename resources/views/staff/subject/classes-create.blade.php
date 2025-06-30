@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">
@endpush

@section('title')
    SiMaput | Tambah Jurusan
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Tambah Jurusan</h4>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Nama Guru</label>
                            <div class="col-sm-9">
                                <select class="form-select select2" id="teach_teacher_id" name="teach_teacher_id"
                                    oninvalid="this.setCustomValidity('Wajib Diisi')" onchange="this.setCustomValidity('')"
                                    required>
                                    <option value="">-- Pilih --</option>


                                    @foreach ($teacher as $teacher)
                                        <option value="{{ $teacher->usr_id }}">
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('teach_teacher_id')
                                <div>error</div>
                            @enderror
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
                                <select class="form-select select2" id="class_ids" name="teach_class_id[]" multiple="multiple"
                                    required>
                               

                                    @foreach ($classes as $class)
                                        <option value="{{ $class->cls_id }}">
                                            {{ $class->cls_level }} {{ $class->cls_major->mjr_prefix }}
                                            {{ $class->cls_number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('teach_class_id')
                                <div>error</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="submit" class="btn btn-primary" value="Kirim" id="">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection



@push('script')
    <script src="{{ asset('assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/forms/select2.init.js') }}"></script>
@endpush
