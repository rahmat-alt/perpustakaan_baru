@extends('dashboard.dashboard-view')

@section('edit-content')
<div class="container">
    <h3>Tambah Berita</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
    </div>
    @endif

    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" value="{{ $berita->judul }}">

        <input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis" value="{{ $berita->penulis }}">

        <textarea name="berita" class="form-control mb-2" placeholder="Isi berita">{{ $berita->berita }}</textarea>

        <select name="kategori" class="form-control mb-2">
            <option value="">Pilih kategori</option>
            <option value="pengumuman" {{ $berita->kategori == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
            <option value="berita" {{$berita->kategori =='berita' ? 'selected' : ''}}>Berita</option>
            <option value="informasi" {{$berita->kategori == 'informasi' ? ' selected ' : ''}}>Informasi</option>
        </select>

        <select name="status" class="form-control mb-2">
            <option value="">Pilih status</option>
            <option value="draft" {{ $berita->status == 'draft' ? 'selected' : '' }}>
                Draft
            </option>
            <option value="publish" {{ $berita->status == 'publish' ? 'selected' : '' }}>
                Publish
            </option>
        </select>


        <input type="file" name="gambar" class="form-control mb-3" value="{{ $berita->gambar }}">

        @if($berita->gambar)
        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset('data_file/'.$berita->gambar) }}" width="150">
        </div>
        @endif


        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
