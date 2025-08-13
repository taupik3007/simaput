@php
    if (Auth::user()->hasRole('teacher')) {
        $layout = 'teacher.master';
    } elseif (Auth::user()->hasRole('student')) {
        $layout = 'student.master';
    } elseif (Auth::user()->hasRole('staff')) {
        $layout = 'staff.master';
    } else {
        $layout = 'layouts.app'; // fallback
    }
@endphp
@extends($layout)

@section('title')
    SiMaput | Ubah Foto Profil
@endsection

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ubah Foto Profil</h4>

                {{-- Preview Foto Sekarang --}}
                <div class="mb-4 text-center">
                    <img src="{{ Auth::user()->profile_photo_path
                        ? asset('storage/' . Auth::user()->profile_photo_path)
                        : asset('assets/images/profile/user-1.jpg') }}"
                        class="rounded-circle" width="150" height="150" alt="Foto Profil">
                </div>

                {{-- Form Upload Foto --}}
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="photo" class="form-label">Pilih Foto Baru</label>
                        <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG. Maksimal 2MB.</small>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary me-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
