<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<table>
    <thead>
    <tr>
        <th>FOTO</th>
        <th>NIM</th>
        <th>NAMA MAHASISWA</th>
        <th>PROGRAM STUDI</th>
        <th>FAKULTAS</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td class="text-center">
                <img src="{{ asset('storage/public/posts/' . $post->foto_mahasiswa) }}" class="rounded-circle" style="width: 80px; height: 85px">
            </td>
            <td>{{ $post->nim }}</td>
            <td>{{ $post->nama_mahasiswa }}</td>
            <td>{{ $post->prodi->nama_prodi ?? 'Prodi tidak ditemukan' }}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
