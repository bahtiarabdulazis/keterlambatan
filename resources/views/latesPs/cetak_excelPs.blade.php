<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Total Keterlambatan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $siswaData = [];
            @endphp

            @foreach ($lates as $item)
                @php
                    $student = $item->student;
                    $nis = $student->nis;
                    $nama = $student->name;
                    $rombel = $student->rombel->rombel;
                    $rayon = $student->rayon->rayon;
                    $jumlahKeterlambatan = $student->lates->count();

                    if (!array_key_exists($nis, $siswaData)) {
                        $siswaData[$nis] = [
                            'nama' => $nama,
                            'rombel' => $rombel,
                            'rayon' => $rayon,
                            'jumlahKeterlambatan' => $jumlahKeterlambatan,
                        ];
                    }
                @endphp
            @endforeach

            @foreach ($siswaData as $nis => $data)
                <tr>
                    <td>{{ $nis }}</td>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['rombel'] }}</td>
                    <td>{{ $data['rayon'] }}</td>
                    <td>{{ $data['jumlahKeterlambatan'] }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>