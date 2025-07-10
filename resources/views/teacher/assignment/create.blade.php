@extends('teacher.master')

@section('title', 'Tambah Modul Pembelajaran')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-4">Tambah Modul Pembelajaran</h4>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="asg_teaching_id" value="{{ $id }}">

                <div class="mb-3">
                    <label class="form-label">Nama Tugas</label>
                    <input type="text" name="asg_title" class="form-control" required>
                    @error('asg_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">File Tugas (PDF, DOCX, dsb)</label>
                    <input type="file" name="asg_file" class="form-control" required>
                    @error('asg_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal & Jam Akhir Pengumpulan</label>
                    <input type="datetime-local" name="asg_due_date" class="form-control" required>
                    @error('asg_due_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Tugas</label>
                    <textarea type="text" name="asg_description" rows="10" class="form-control" required> </textarea>
                    @error('asg_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="ti ti-plus"></i> Simpan Tugas
                </button>
            </form>
        </div>
    </div>
@endsection
