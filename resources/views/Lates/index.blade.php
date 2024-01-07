@extends('layouts.template')

@section('content')
    <a href="{{ route('lates.create') }}">
        <button class="btn btn-primary mt-3">Tambah Data</button>
    </a>
    <a href="{{ route('lates.export_excel') }}"><button class="btn btn-info mt-3 text-light">Export Data Keterlambatan</button></a>
    <div class="container mt-4">

        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1">Keseluruhan Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2">rekapitulasi Data</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1">
                <br>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Informasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($lates as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->student->nis }}<br>{{ $item->student->name }}</td>
                                <td>{{ $item['date_time_late'] }}</td>
                                <td>{{ $item['information'] }}</td>
                                <td class="d-flex justify-content-center" style="padding: 20px;">
                                    <a href="{{ route('lates.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                                    <form action="{{ route('lates.delete', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="tab2">
                <br>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jumlah Keterlambatan</th>
                            <th>Detail</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $siswaData = [];
                        @endphp
                        @foreach ($lates as $item)
                            @php
                                $student = $item->student;
                                $nis = $student->nis;
                                $nama = $student->name;
                                $jumlahKeterlambatan = $student->lates->count();

                                if (!array_key_exists($nis, $siswaData)) {
                                    $siswaData[$nis] = [
                                        'nama' => $nama,
                                        'jumlahKeterlambatan' => $jumlahKeterlambatan,
                                    ];
                                }
                            @endphp
                        @endforeach

                        @foreach ($siswaData as $nis => $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $nis }}</td>
                                <td>{{ $data['nama'] }}</td>
                                <td>{{ $data['jumlahKeterlambatan'] }}</td>
                                <td>
                                    <a href="{{ route('lates.detail', $nis) }}" style="text-decoration: none;">Lihat</a>
                                </td>
                                <td>
                                    @if ($data['jumlahKeterlambatan'] >= 3)
                                        <a href="{{ route('lates.download_pdf', $nis) }}"
                                            class="btn btn-primary">Cetak Surat Pernyataan</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
