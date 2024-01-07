@extends('layouts.templatePs')

@section('content')
    <h5 style="color:rgb(0, 64, 137)" class="mb-3">Data Siswa</h5>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($groupedLates as $nis => $items)
                @php
                    $student = $items->first()->student;
                @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $student->nis }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->rombel->rombel }}</td>
                    <td>{{ $student->rayon->rayon }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection