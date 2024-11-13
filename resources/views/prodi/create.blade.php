<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="card-body">
    <form action="{{ route('prodi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold">NAMA</label>
            <input type="text" class="form-control @error('nama_prodi') is-invalid
            @enderror"
                   name="nama_prodi" value="{{ old('nama_prodi') }}" placeholder="Masukkan Nama Fakultas">
            <!-- error message untuk nim -->
            @error('nim')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fakultas" class="form-label">Fakultas</label>
            <select class="form-select" id="fakultas" name="fakultas_id">
                @foreach ($fakultas as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_fakultas }}</option>
                @endforeach
            </select>
        </div>
        <!-- error message untuk nama mahasiswa -->
        @error('nama_prodi')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
<button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
<button type="reset" class="btn btn-md btn-warning">RESET</button>
</form>
</div>
