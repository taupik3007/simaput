@extends('staff.master')

@push('link')
@endpush

@section('title')
    SiMaput | Sekolah Asal
@endsection

@section('content')
    <div class=" row justify-content-center">
        @foreach ($majors as $major)
            <div class="col-xxl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Column -->
                            <div class="col d-flex align-items-center">
                                <div>
                                    <h3>{{ $major->registrations_count }}</h3>
                                    <p class="mb-0">
                                        {{ $major->mjr_name }}
                                    </p>
                                </div>
                            </div>
                            <!-- Column -->
                            <div class="col d-flex align-items-center justify-content-end">
                                <div data-label="40%" class="css-bar mb-0 css-bar-warning css-bar-40">
                                    <i class="ti ti-user-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Sekolah Asal</h4>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body">


                        @foreach ($majors as $major)

                            <div class="mb-4 row align-items-center">
                                <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Jumlah Kelas {{$major->mjr_name}}</label>
                                <div class="col-sm-9">
                                    <input type="number" min="1" name="classes[{{$major->mjr_id}}]" class="form-control"
                                        value="" id="exampleInputText2"
                                        placeholder="" required
                                        >
                                </div>
                                @error('ors_school_name')
                                    <div>error</div>
                                @enderror
                            </div>
                        @endforeach


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
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/js/widget/card-custom.js"></script>
@endpush
