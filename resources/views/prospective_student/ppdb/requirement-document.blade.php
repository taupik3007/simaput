@extends('prospective_student.master')

@push('link')
@endpush

@section('title')
    SiMaput | Persyaratan PPDB
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Persyaratan PPDB</h4>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">


                        @foreach ($requirementDocument as $requirement)
                            <div class="mb-4 row align-items-center">
                                <label for="exampleInputText2"
                                    class="form-label col-sm-3 col-form-label">{{ $requirement->rqd_name }}</label>
                                <div class="col-sm-9">
                                    @if ($submitted->has($requirement->rqd_id))
                                        <div
                                            class="alert alert-success py-2 px-3 d-flex justify-content-between align-items-center">
                                            <span>
                                                Sudah diunggah:
                                                <a href="{{ asset('storage/' . $submitted[$requirement->rqd_id]->rdc_file) }}"
                                                    target="_blank" class="link-primary text-decoration-underline">Lihat
                                                    File
                                                </a>
                                            </span>
                                        </div>
                                        <small class="text-muted">Kalau ingin ganti file, unggah ulang di bawah ini:</small>
                                    @endif
                                    <input type="file" name="files[{{ $requirement->rqd_id }}]" class="form-control"
                                        value="" id="exampleInputText2" placeholder="">
                                    @error('files.' . $requirement->rqd_id)
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                @if($requirementDocument->count() != 0)
                                <input type="submit" class="btn btn-primary" value="Kirim" id="">
                                @endif
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
