@extends('layouts.template')

@section('content')
    <form action="{{ route('lates.store') }}" method="POST" class="card p-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-laber">Nama</label>
            <div class="col-sm-10">
                <select name="student_id" id="student_id" class="form-select">
                    @foreach ($student as $lat)
                    <option value="{{ $lat->id }}">{{ $lat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date_time_late" class="col-sm-2 col-form-laber">Tanggal</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="date_time_late" name="date_time_late">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-laber">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="information" name="information">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-laber">Bukti</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection
