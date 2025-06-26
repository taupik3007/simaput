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
                <form action="" method="post" id="requirement-form">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-danger text-danger" {{ $isComplete ? 'hidden' : ''}} role="alert">
                            <strong>Perhatian -</strong> tidak bisa mendaftar karena data calon siswa belum lengkap
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Pilih Jurusan</label>
                            <div class="col-sm-9">
                                <select class="form-select mr-sm-2" id="inlineFormCustomSelect"
                                    {{ optional($admissionMajor)->sar_user_id == Auth::user()->usr_id || !$isComplete ? 'disabled ' : '' }}
                                    name="sar_major_id" required>
                                    <option value="">Pilih..</option>
                                    @foreach ($major as $major)
                                        <option
                                            value="{{ $major->mjr_id }}"{{ optional($admissionMajor)->sar_major_id == $major->mjr_id ? 'selected ' : '' }}>
                                            {{ $major->mjr_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            @error('sar_major_id')
                                <div>error</div>
                            @enderror
                        </div>
                        <input type="text" hidden name="sar_student_admission_id" value="{{ $admission->sta_id }}">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <input type="button" class="btn btn-primary"
                                    {{ optional($admissionMajor)->sar_user_id == Auth::user()->usr_id ? 'disabled ' : '' }}
                                    id="btn-confirm" value="Kirim" id="">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        document.getElementById('btn-confirm').addEventListener('click', function() {
            let inputs = document.querySelectorAll('.form-select');
            let allFilled = true;

            inputs.forEach(function(input) {
                if (!input.files.length) {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                Swal.fire({
                    title: 'Oops!',
                    text: 'Semua persyaratan harus diisi terlebih dahulu.',
                    icon: 'error',
                    confirmButtonText: 'Mengerti'
                });
            } else {
                Swal.fire({
                    title: 'Kamu Yakin?',
                    text: "Data akan dikirim dan tidak bisa diubah!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('requirement-form').submit();
                    }
                });
            }
        });
    </script>
@endsection



@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btn-confirm').addEventListener('click', function(e) {
            const jurusan = document.getElementById('inlineFormCustomSelect').value;

            if (jurusan === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Kamu belum memilih jurusan!',
                    confirmButtonText: 'Oke'
                });
                return; // Jangan submit form
            }

            // Kalau valid, tampilkan konfirmasi dulu
            Swal.fire({
                title: 'Yakin kirim data?',
                text: "Pastikan pilihan kamu sudah sesuai, ya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('requirement-form').submit();
                }
            });
        });
    </script>
@endpush
