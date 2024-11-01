@extends('dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h3>Detail Mahasiswa</h3>
                        <div class="mb-3">
                            <img src="{{ asset('storage/public/posts/' . $post->foto_mahasiswa) }}" class="rounded-circle" style="width: 100px; height: 110px">
                        </div>
                        <p><strong>NIM:</strong> {{ $post->nim }}</p>
                        <p><strong>Nama Mahasiswa:</strong> {{ $post->nama_mahasiswa }}</p>
                        <!-- Add more fields as necessary -->
                        <a href="{{ route('posts.index') }}" class="btn btn-md btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
