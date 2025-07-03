@extends('teacher.master')

@section('title', 'Tambah Modul Pembelajaran')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Tambah Adminsitrasi Pembelajaran</h4>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Tambah ini untuk metode update -->

               

                <div class="mb-3">
                    <label class="form-label">Judul Modul</label>
                    <input type="text" name="mod_title" value="{{ $module->mod_name }}" class="form-control" required>
                    @error('mod_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">File Modul (PDF, DOCX, dsb)</label>
                    <input type="file" name="mod_file" class="form-control">
                    @error('mod_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    @if ($module->mod_file)
                        <small class="d-block mt-1 text-muted">
                            File saat ini: <a href="{{ asset('storage/' . $module->mod_file) }}" target="_blank">Lihat
                                File</a>
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="ti ti-device-floppy"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection
