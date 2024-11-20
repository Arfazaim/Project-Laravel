@extends('dashboard')

@section('content')
    <div class="card-body">
        <a href="{{ route('fakultas.create') }}" class="btn btn-md btn-success mb-3 bg-">Tambah Fakultas</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAMA FAKULTAS</th>
                <th scope="col">ACT</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($fakultas as $info)
                <tr>
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->nama_fakultas }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('fakultas.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('fakultas.destroy', $info->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Fakultas belum Tersedia.
                </div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
