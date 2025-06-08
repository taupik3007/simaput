@extends('prospective_student.master')

@push('link')
@endpush

@section('title')
    SiMaput | Pendaftaran PPDB
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Pendaftaran PPDB</h4>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pilih Jurusan</label>
                            <div class="col-sm-9">
                                <select class="form-select mr-sm-2" id="inlineFormCustomSelect" name="sar_major_id"
                                    oninvalid="this.setCustomValidity('Jenis Kelamin Wajib Diisi')"
                                    onchange="this.setCustomValidity('')" required>
                                   <option value="">Pilih..</option>
                                    @foreach ($major as $major)
                                   <option value="{{$major->mjr_id}}"{{optional($admissionMajor)->sar_major_id == $major->mjr_id ? 'selected'  : ''}}>{{$major->mjr_name}}</option>
                                        
                                    @endforeach
                                   

                                </select>
                            </div>
                            @error('sar_major_id')
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
@endpush
