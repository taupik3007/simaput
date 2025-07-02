@extends('teacher.master')

@section('title', 'Tambah Modul Pembelajaran')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Tambah Modul Pembelajaran</h4>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="mod_teach_id" value="{{ $teaching->teach_id }}">

            <div class="mb-3">
                <label class="form-label">Judul Modul</label>
                <input type="text" name="mod_title" class="form-control" required>
                @error('mod_title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">File Modul (PDF, DOCX, dsb)</label>
                <input type="file" name="mod_file" class="form-control" required>
                @error('mod_file') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Mulai Bisa Diakses</label>
                <input type="date" name="mod_start_date" class="form-control" required>
                @error('mod_start_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="ti ti-plus"></i> Simpan Modul
            </button>
        </form>
    </div>
</div>
@endsection
