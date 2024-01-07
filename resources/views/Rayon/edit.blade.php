@extends('layouts.template')
@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Edit Rayon</h5>
    <form action="{{ route('rayon.update', $rayon['id']) }}" method="POST" class="card p-5">
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
            <label for="rayon" class="col-sm-2 col-form-label">Rayon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rayon" name="rayon" value="{{ $rayon && $rayon instanceof \App\Models\rayons ? $rayon['rayon'] : '' }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-label">User_id :</label>
            <div class="col-sm-10">
                <select name="user_id" id="user_id" class="form-select">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $rayon['user_id'] ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection
