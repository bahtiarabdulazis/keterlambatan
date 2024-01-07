@extends('layouts.template')
@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Edit Rombel</h5>
    <form action="{{ route('rombel.update', $rombel['id']) }}" method="POST" class="card p-5">
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
            <label for="rombel" class="col-sm-2 col-form-laber">Rombel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombel['rombel'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection
