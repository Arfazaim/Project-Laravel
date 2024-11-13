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
{{--                <td class="text-center">--}}
{{--                    <form--}}
{{--                        onsubmit="return confirm('Apakah Anda Yakin?');"action="{{ route('posts.destroy', $post->id) }}"--}}
{{--                        method="POST"><a href="{{ route('posts.edit', $post->id) }}"--}}
{{--                            class="btn btn-sm btn-primary">EDIT</a>--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @empty
            <div class="alert alert-danger">
                Data Fakultas belum Tersedia. </div>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
