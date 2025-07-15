@extends('teacher.master')
@section('content')
<h4>Lihat Rapor - {{ $student->user->name }}</h4>

<form action="{{ url('/teacher/student/' . $student->std_id . '/report/download') }}" method="GET">
    <div class="mb-3">
        <label for="semester">Pilih Semester</label>
        <select name="semester" id="semester" class="form-control" required>
            <option value="">-- Pilih Semester --</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->smt_id }}">{{ $semester->smt_name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">📥 Unduh PDF Rapor</button>
</form>
@endsection
