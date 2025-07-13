@extends('student.master')

@section('title', 'Kumpulkan Tugas')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">📘 Kumpulkan Tugas</h4>

        <div class="mb-4">
            <h5>{{ $assignment->asg_title }}</h5>
            <p class="text-muted">
                Tenggat: 
                <strong>{{ \Carbon\Carbon::parse($assignment->asg_due_date)->translatedFormat('l, d F Y H:i') }}</strong>
            </p>

            @if ($assignment->asg_file)
                <p>
                    <i class="ti ti-paperclip"></i> 
                    <a href="{{ route('student.assignment.download', basename($assignment->asg_file)) }}" target="_blank">
                        Download File Tugas
                    </a>
                </p>
            @endif

            <div class="border rounded p-3 bg-light">
                {!! nl2br(e($assignment->asg_description)) !!}
            </div>
        </div>

       @if ($submission)
    <div class="alert alert-success">
        <h5 class="mb-2">✅ Kamu sudah mengumpulkan tugas ini</h5>
        <p><strong>Dikumpulkan:</strong> {{ \Carbon\Carbon::parse($submission->asb_submitted_at)->translatedFormat('d F Y H:i') }}</p>
        <p><strong>File Jawaban:</strong> 
            <a href="{{ asset('storage/' . $submission->asb_file) }}" target="_blank">Download Jawaban</a>
        </p>

        @if ($submission->asb_score !== null)
            <p><strong>Nilai:</strong> {{ $submission->asb_score }}</p>
        @endif

        @if ($submission->asb_feedback)
            <div class="border rounded p-2 bg-white">
                <strong>Catatan Guru:</strong><br>
                {!! nl2br(e($submission->asb_feedback)) !!}
            </div>
        @endif

        @if ($isBeforeDeadline && $submission->asb_score == null)
            <hr>
            <form action="{{ route('student.assignments.store', $assignment->asg_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Ganti Jawaban (Upload Ulang)</label>
                    <input type="file" name="asb_file" class="form-control" required>
                    @error('asb_file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning">
                    <i class="ti ti-upload"></i> Upload Ulang Jawaban
                </button>
            </form>
        @else
            <div class="alert alert-warning mt-3 mb-0">
                ⛔ Batas waktu pengumpulan sudah berakhir
            </div>
        @endif
    </div>
@else
    {{-- Kalau belum submit sama sekali --}}
    <form action="{{ route('student.assignments.store', $assignment->asg_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Upload Jawaban Kamu (PDF, DOCX, ZIP, RAR)</label>
            <input type="file" name="asb_file" class="form-control" required>
            @error('asb_file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">
            <i class="ti ti-upload"></i> Kumpulkan Jawaban
        </button>
    </form>
@endif

    </div>
</div>
@endsection
