@extends('dashboard')

@section('content')
    <div class="card-body">
        <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_fakultas">Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" value="{{ $fakultas->nama_fakultas }}">
            </div>
            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
        </form>
    </div>
@endsection
