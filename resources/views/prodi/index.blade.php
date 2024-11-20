@extends('dashboard')
@section('content')
    <div class="card-body">
        <a href="{{ route('prodi.create') }}" class="btn btn-md btn-success mb-3 bg-">Tambah Prodi</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nama Fakultas</th>
                <th scope="col">NAMA Prodi</th>
                <th scope="col">ACT</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($prodi as $info)
                <tr>
                    <td>{{ $info->id }}</td>
                    @if ($info->fakultas)
                        <td>{{ $info->fakultas->nama_fakultas }}</td>
                    @else
                        <td>Tidak ada fakultas</td>
                    @endif
                    <td>{{ $info->nama_prodi }}</td>
                    <td class="text-center">
                        <a href="{{ route('prodi.edit', $info->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('prodi.destroy', $info->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Mahasiswa belum Tersedia. </div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
