@extends('layouts.template')

@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Data Rayon</h5>
<a href="{{ route('rayon.create') }}"><button class="btn btn-success mt-3">Tambah Data</button></a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Rayon</th>
                <th>User_id</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($rayon as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rayon'] }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rayon.edit', $item['id']) }}" class="btn btn-danger me-3">Edit</a>
                        <form action="{{ route('rayon.destroy', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- {{ route('rombel.create') }} --}}
{{-- {{ route('rombel.edit', $item['id']) }} --}}
{{-- {{ route('rombel.delete', $item['id']) }} --}}
