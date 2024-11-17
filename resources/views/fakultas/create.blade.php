@extends('dashboard')
@section('content')
<div class="card-body">
    <form action="{{ route('fakultas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">NAMA</label>
            <input type="text"
                   class="form-control @error('nama_fakultas') is-invalid
            @enderror"
                   name="nama_fakultas"  value="{{ old('nama_fakultas') }}" placeholder="Masukkan Nama Fakultas">
            <!-- error message untuk nim -->
            @error('nim')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <!-- error message untuk nama mahasiswa -->
        @error('nama_fakultas')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>
</div>
@endsection
