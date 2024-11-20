@extends('dashboard')
@section('content')
    <div class="card-body">
        <h3>Edit Data Program Studi</h3>
        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_prodi">Nama Program Studi</label>
                <input type="text" name="nama_prodi" class="form-control" value="{{ $prodi->nama_prodi }}" required>
            </div>
            <div class="form-group">
                <label for="fakultas_id">Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id" required>
                    @foreach($fakultas as $f)
                        <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
                            {{ $f->nama_fakultas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
