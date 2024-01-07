@extends('layouts.template')

@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Tambah Rombel</h5>
    <form action="{{ route('rombel.store') }}" method="POST" class="card  p-5">
        @csrf
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-laber">Rombel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rombel" name="rombel">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-3">Tambah Data</button>
    </form>
@endsection
