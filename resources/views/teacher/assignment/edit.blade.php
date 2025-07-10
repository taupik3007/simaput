@extends('teacher.master')

@section('title', 'Edit Tugas')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Edit Tugas</h4>

        <form action="{{ route('teacher.assignments.update', $assignment->asg_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="asg_teaching_id" value="{{ $assignment->asg_teaching_id }}">

            <div class="mb-3">
                <label class="form-label">Nama Tugas</label>
                <input type="text" name="asg_title" class="form-control" value="{{ $assignment->asg_title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">File Baru (kosongkan jika tidak diubah)</label>
                <input type="file" name="asg_file" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal & Jam Akhir Pengumpulan</label>
                <input type="datetime-local" name="asg_due_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($assignment->asg_due_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Tugas</label>
                <textarea name="asg_description" class="form-control" rows="10" required>{{ $assignment->asg_description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="ti ti-edit"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>
@endsection
