@extends('teacher.master')

@section('title', 'Input Nilai Mapel')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-3">✏️ Input Nilai - {{ $teaching->subject->subj_name }}</h4>
        <p>Kelas: <strong>{{ $teaching->class->cls_name }}</strong> | Semester: <strong>{{ $semester->smt_name }}</strong></p>

        <form action="{{ route('teacher.report.store', $teaching->teach_id) }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $no => $detail)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>{{ $detail->reportCard->student->std_nis }}</td>
                                <td>{{ $detail->reportCard->student->user->name }}</td>
                                <td width="10%">
                                    <input type="number"
                                           name="scores[{{ $detail->rcd_id }}]"
                                           value="{{ old('scores.' . $detail->rcd_id, $detail->rcd_score ?? $detail->auto_score) }}"
                                           class="form-control"
                                           min="0" max="100"
                                           required>
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="ti ti-device-floppy"></i> Simpan Nilai
            </button>
        </form>
    </div>
</div>
@endsection
