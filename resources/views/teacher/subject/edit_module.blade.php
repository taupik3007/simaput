@extends('teacher.master')

@section('title', 'Tambah Modul Pembelajaran')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Tambah Modul Pembelajaran</h4>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            

            <div class="mb-3">
                <label class="form-label">Judul Modul</label>
                <input type="text" name="mod_title" class="form-control" value="{{$module->mod_name}}" required>
                @error('mod_title') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

           
            <div class="mb-3">
                <label class="form-label">Tanggal Mulai Bisa Diakses</label>
                <input type="date" name="mod_start_date" value="{{$module->mod_start_date}}" class="form-control" required>
                @error('mod_start_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="ti ti-plus"></i> Simpan Modul
            </button>
        </form>
    </div>
</div>
@endsection
