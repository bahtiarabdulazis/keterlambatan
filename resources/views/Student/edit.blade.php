@extends('layouts.template')
@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Edit Siswa</h5>
    <form action="{{ route('student.update', $student['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $student['nis'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel_id" class="col-sm-2 col-form-label">Rombel_id :</label>
            <div class="col-sm-10">
                <select name="rombel_id" id="rombel_id" class="form-select">
                    @foreach ($rombel as $rom)
                        <option value="{{ $rom->id }}" {{ $rom->id == $student['rombel_id'] ? 'selected' : '' }}>
                            {{ $rom->rombel }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon_id" class="col-sm-2 col-form-label">Rayon_id :</label>
            <div class="col-sm-10">
                <select name="rayon_id" id="rayon_id" class="form-select">
                    @foreach ($rayon as $ray)
                        <option value="{{ $ray->id }}" {{ $ray->id == $student['rayon_id'] ? 'selected' : '' }}>
                            {{ $ray->rayon }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection
