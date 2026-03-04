@extends('dashboard.dashboard-view')

@section('content')
<div class="container">
    <h3>Tambah Berita</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
    </div>
    @endif

    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" class="form-control mb-2" placeholder="Judul">

        <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis">

        <textarea name="berita" class="form-control mb-2" placeholder="Isi berita"></textarea>

        <select name="kategori" class="form-control mb-2">
            <option value="">Pilih kategori</option>
            <option value="pengumuman">Pengumuman</option>
            <option value="berita">Berita</option>
            <option value="informasi">Informasi</option>
        </select>

        <select name="status" class="form-control mb-2">
            <option value="">Pilih status</option>
            <option value="draft">Draft</option>
            <option value="publish">Publish</option>
        </select>

        <input type="file" name="gambar" class="form-control mb-3">

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
