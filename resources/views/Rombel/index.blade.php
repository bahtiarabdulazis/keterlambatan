@extends('layouts.template')

@section('content')
<h5 style="color:rgb(0, 64, 137)" class="mb-3">Data Rombel</h5>
<a href="{{ route('rombel.create') }}"><button class="btn btn-warning mt-3">Tambah Data</button></a>
    <br>
    <br>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($rombels as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['rombel'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rombel.edit', $item['id']) }}" class="btn btn-danger me-3">Edit</a>
                        <form action="{{ route('rombel.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Hapus</button>
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
