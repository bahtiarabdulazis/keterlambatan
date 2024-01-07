@extends('layouts.template')

@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Tambah User</h5>
    <form action="{{ route('user.store') }}" method="POST" class="card  p-5">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-laber">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-laber">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role :</label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    <option value="admin">admin</option>
                    <option value="ps">ps</option>

                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-laber">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
    </form>
@endsection
