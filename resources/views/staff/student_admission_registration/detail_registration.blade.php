@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiMaput | Daftar Jurusan
@endsection

@section('content')
    <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                    id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button"
                    role="tab" aria-controls="pills-account" aria-selected="true">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Biodata</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                    id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
                    role="tab" aria-controls="pills-notifications" aria-selected="false">
                    <i class="ti ti-users me-2 fs-6"></i>
                    <span class="d-none d-md-block">Data Orang Tua</span>
                </button>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                    id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab"
                    aria-controls="pills-bills" aria-selected="false">
                    <i class="ti ti-map-pin me-2 fs-6"></i>
                    <span class="d-none d-md-block">Alamat</span>
                </button>
            </li> --}}
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                    id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button"
                    role="tab" aria-controls="pills-security" aria-selected="false">
                    <i class="ti ti-school me-2 fs-6"></i>
                    <span class="d-none d-md-block">Sekolah Asal</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                    id="pills-requirement-tab" data-bs-toggle="pill" data-bs-target="#pills-requirement" type="button"
                    role="tab" aria-controls="pills-security" aria-selected="false">
                    <i class="ti ti-notes me-2 fs-6"></i>
                    <span class="d-none d-md-block">Persyaratan PPDB</span>
                </button>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel"
                    aria-labelledby="pills-account-tab" tabindex="0">
                    <div class="row">
                        {{-- <div class="col-lg-12 d-flex align-items-stretch">
                      <div class="card w-100 border position-relative overflow-hidden">
                        <div class="card-body p-4">
                          <h4 class="card-title">Change Profile</h4>
                          <p class="card-subtitle mb-4">Change your profile picture from here</p>
                          <div class="text-center">
                            <img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="img-fluid rounded-circle" width="120" height="120">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                              <button class="btn btn-primary">Upload</button>
                              <button class="btn bg-danger-subtle text-danger">Reset</button>
                            </div>
                            <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          </div>
                        </div>
                      </div>
                    </div> --}}

                        <div class="col-12">
                            <div class="card w-100 border position-relative overflow-hidden mb-0">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Biodata</h4>
                                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputtext" class="form-label">Nama Lengkap</label>
                                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                                        readonly id="exampleInputtext">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">NIK</label>
                                                    <input type="text" class="form-control" value="{{ $user->usr_nik }}"
                                                        readonly id="exampleInputtext">

                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputtext1" class="form-label">Email</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->email }}" readonly id="exampleInputtext1"
                                                        placeholder="info@modernize.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Tempat Lahir</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->biodata->bio_place_of_birth }}" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Tanggal
                                                        Lahir</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ Carbon\Carbon::parse($user->biodata->bio_date_of_birth)->isoFormat('dddd, D MMMM Y  ') }}"
                                                        readonly id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputtext2" class="form-label">Jenis
                                                        Kelamin</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->biodata->bio_gender == 1 ? 'Laki-laki' : 'Perempuan' }}"
                                                        readonly id="exampleInputtext2" placeholder="Maxima Studio">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Agama</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->biodata->bio_religion->rlg_name }}" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Tinggi Badan</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->biodata->bio_height }} cm" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Berat Badan</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->biodata->bio_weight }} Kg" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>

                                            </div>

                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-notifications" role="tabpanel"
                    aria-labelledby="pills-notifications-tab" tabindex="0">
                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden mb-0">
                            <div class="card-body p-4">
                                <h4 class="card-title">Biodata</h4>
                                <p class="card-subtitle mb-4">To change your personal detail , edit and save from here
                                </p>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputtext" class="form-label">Nama Ayah</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->parent->prn_father_name }}" readonly
                                                    id="exampleInputtext">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pekerjaan Ayah</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->parent->prn_father_occupation }}" readonly
                                                    id="exampleInputtext">

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Nomor Telepon
                                                    Ayah</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_father_phone }}" readonly
                                                    id="exampleInputtext1" placeholder="info@modernize.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Nama Ibu</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_mother_name }}" readonly
                                                    id="exampleInputtext1" placeholder="info@modernize.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Perkerjaan Ibu</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_mother_occupation }}" readonly
                                                    id="exampleInputtext1" placeholder="info@modernize.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext2" class="form-label">Nomor Telepon
                                                    Ibu</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $user->parent->prn_mother_phone }}" readonly
                                                    id="exampleInputtext2" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">


                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Nama Wali</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_guardian_name }}" readonly
                                                    id="exampleInputtext1" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Pekerjaan wali</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_guardian_occupation }} " readonly
                                                    id="exampleInputtext1" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Nomor Telepon
                                                    wali</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_guardian_phone }} " readonly
                                                    id="exampleInputtext1" >
                                            </div>
                                            <div class="mb-3">
                                                @php
                                                    $parentStatus = [
                                                        1 => 'Lengkap',
                                                        2 => 'Yatim',
                                                        3 => 'Piatu',
                                                        4 => 'Yatim Piatu',
                                                        5 => 'Lainnya',
                                                    ];

                                                    $parentStatusValue =
                                                        $parentStatus[$user->parent->prn_status ?? 0] ?? 'Belum Diisi';
                                                @endphp

                                                <label for="exampleInputtext3" class="form-label">Status Orang Tua</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $parentStatusValue }} " readonly id="exampleInputtext1"
                                                    >
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext3" class="form-label">Penghasilan Orang
                                                    Tua</label>
                                                <input type="email" class="form-control"
                                                    value="{{ $user->parent->prn_family_income_level }} " readonly
                                                    id="exampleInputtext1" placeholder="info@modernize.com">
                                            </div>

                                        </div>

                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bills" role="tabpanel" aria-labelledby="pills-bills-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card w-100 border position-relative overflow-hidden mb-0">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Biodata</h4>
                                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="exampleInputtext" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->parent->prn_father_name }}" readonly
                                                        id="exampleInputtext">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kabupaten</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->parent->prn_father_occupation }}" readonly
                                                        id="exampleInputtext">

                                                </div>


                                            </div>
                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="exampleInputtext1" class="form-label">Kecamatan</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->parent->prn_father_phone }}" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputtext3" class="form-label">Desa</label>
                                                    <input type="email" class="form-control"
                                                        value="{{ $user->parent->prn_mother_name }}" readonly
                                                        id="exampleInputtext1" placeholder="info@modernize.com">
                                                </div>


                                            </div>
                                            <div class="col-lg-12">

                                                <div class="mb-3">
                                                    <label for="exampleInputtext1" class="form-label">Kecamatan</label>

                                                    <textarea readonly name="" id="" cols="30" rows="10" class="form-control">{{ $user->address->adr_detail }}</textarea>
                                                </div>



                                            </div>

                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card w-100 border position-relative overflow-hidden mb-0">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Biodata</h4>
                                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="exampleInputtext" class="form-label">Asal SMP</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->originSchool->ors_school_name }}" readonly
                                                        id="exampleInputtext">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">NPSN SMP Asal</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->originSchool->ors_npsn }}" readonly
                                                        id="exampleInputtext">

                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Nomor UN SMP </label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->originSchool->ors_un_participant_number }}" readonly
                                                        id="exampleInputtext">

                                                </div>


                                            </div>


                                          
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="tab-pane fade" id="pills-requirement" role="tabpanel" aria-labelledby="pills-security-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card w-100 border position-relative overflow-hidden mb-0">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Biodata</h4>
                                    <p class="card-subtitle mb-4">To change your personal detail , edit and save from here
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">

                                                @foreach ($requirementDocument as $rqd)
                                                    <div class="mb-3">
                                                        <label for="exampleInputtext"
                                                            class="form-label">{{ $rqd->rqd_name }}</label>
                                                        <div
                                                            class="alert alert-success py-2 px-3 d-flex justify-content-between align-items-center">
                                                            <span>
                                                                Sudah diunggah:
                                                                <a href="{{ asset('storage/' . $submission[$rqd->rqd_id]->rdc_file) }}"
                                                                    target="_blank"
                                                                    class="link-primary text-decoration-underline">Lihat
                                                                    File
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>


                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('script')
@endpush
