@extends('staff.master')

@push('link')
    {{-- Tambahkan CSS jika perlu --}}
@endpush

@section('title')
    SiMaput | Ubah Password Guru
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h4 class="card-title mb-0">Ubah Password Staff</h4>
                </div>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="mb-4 row align-items-center">
                            <label for="password" class="form-label col-sm-3 col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password baru"
                                    required oninvalid="this.setCustomValidity('Wajib diisi')"
                                    onchange="this.setCustomValidity('')">
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label for="password_confirmation" class="form-label col-sm-3 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi password baru"
                                    required oninvalid="this.setCustomValidity('Wajib diisi')"
                                    onchange="this.setCustomValidity('')">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ti ti-device-floppy me-1"></i> Simpan Password Baru
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- Tambahkan JS jika perlu --}}
@endpush
