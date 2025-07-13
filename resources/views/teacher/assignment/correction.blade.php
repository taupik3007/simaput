@extends('teacher.master')

@section('title', 'Koreksi Jawaban')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">📘 Koreksi Jawaban</h4>

        <div class="mb-4">
            <p><strong>Nama Siswa:</strong> {{ $submission->student->name }} (NIS: {{ $submission->student->student->std_nis }})</p>
            <p><strong>Tugas:</strong> {{ $submission->assignment->asg_title }}</p>
            <p><strong>Dikumpulkan:</strong> {{ \Carbon\Carbon::parse($submission->asb_submitted_at)->translatedFormat('d F Y H:i') }}</p>
        </div>

        <div class="mb-4">
            <p><strong>File Jawaban:</strong></p>
            <a href="" class="btn btn-outline-primary">
                <i class="ti ti-download"></i> Download Jawaban
            </a>
        </div>

        <form action="" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nilai (0–100)</label>
                <input type="number" name="asb_score" class="form-control" value="{{ $submission->asb_score }}" min="0" max="100">
            </div>

            <div class="mb-3">
                <label class="form-label">Feedback</label>
                <textarea name="asb_feedback" class="form-control" rows="4">{{ $submission->asb_feedback }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="ti ti-check"></i> Simpan Penilaian
            </button>
        </form>
    </div>
</div>
@endsection
