@extends('prospective_student.master')

@push('link')
@endpush

@section('title')
    SiMaput | Sekolah Asal
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Sekolah Asal</h4>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body">



                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nama Sekolah
                                Asal</label>
                            <div class="col-sm-9">
                                <input type="text" name="ors_school_name" class="form-control"
                                    value="{{ $originSchool->ors_school_name ?? '' }}" id="exampleInputText2" placeholder=""
                                    required oninvalid="this.setCustomValidity('Nama Sekolah Asal Wajib Diisi')"
                                    onchange="this.setCustomValidity('')">
                            </div>
                            @error('ors_school_name')
                                <div>error</div>
                            @enderror
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">NPSN Sekolah
                                Asal</label>
                            <div class="col-sm-9">
                                <input type="number" name="ors_npsn" min="0" class="form-control"
                                    value="{{ $originSchool->ors_npsn ?? '' }}" id="exampleInputText2" placeholder=""
                                    required oninvalid="this.setCustomValidity('Format Pengisian Salah atau Belum Diisi')"
                                    onchange="this.setCustomValidity('')">
                            </div>
                            @error('ors_npsn')
                                <div>error</div>
                            @enderror
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Nomor UN
                                (opsional)</label>
                            <div class="col-sm-9">
                                <input type="text" name="ors_un_participant_number" class="form-control"
                                    value="{{ $originSchool->ors_un_participant_number ?? '' }}" id="exampleInputText2"
                                    placeholder="" oninvalid="this.setCustomValidity('Singkatan Wajib Diisi')"
                                    onchange="this.setCustomValidity('')">
                            </div>

                            @error('ors_un_participant_number')
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
