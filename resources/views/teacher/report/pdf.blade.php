<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 5px; }
        h2 { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Rapor Siswa</h2>
    <p><strong>Nama:</strong> {{ $student->user->name }}</p>
    <p><strong>Kelas:</strong> {{ $student->class->cls_name }}</p>
    <p><strong>Semester:</strong> {{ $semester->smt_name }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $i => $detail)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $detail->teaching->subject->subj_name }}</td>
                <td>{{ $detail->rcd_score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 30px;"><strong>Catatan Wali Kelas:</strong><br>{{ $reportCard->rpc_level }}</p>
</body>
</html>
