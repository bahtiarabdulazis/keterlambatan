@extends('layouts.template')

@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Tambah Rayon</h5>
    <form action="{{ route('rayon.store')}}" method="POST" class="card  p-5">
        @csrf
        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-laber">Rayon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-laber">User_id</label>
            <div class="col-sm-10">
                <select name="user_id" id="user_id" class="form-select">
                    @foreach ($user as $ray)
                    <option value="{{ $ray->id }}">{{ $ray->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection
