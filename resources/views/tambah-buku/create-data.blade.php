<!-- @extends('dashboard.dashboard-view')

@section('tambah-buku')
<div class="container">
    <h1>Tambah Data Peminjam</h1>

    <form action="{{url('/tambah/store')}}" method="post">
        @csrf
        <label for="">Nama Peminjam</label>
        <input class="form-control" name="nama_peminjam" id="nama_peminjam" type="text" placeholder="Default input" aria-label="default input example">

        <label for="">No Anggota</label>
        <input class="form-control" name="nomor_anggota" id="nomor_anggota" type="text" placeholder="Default input" aria-label="default input example">

        <label for="">Judul Buku</label>
        <input class="form-control" name="judul_buku" id="judul_buku" type="text" placeholder="Default input" aria-label="default input example">

        <label>Judul Buku</label>
        <select name="judul_buku" class="form-control" required>
            <option value="">-- Pilih Buku --</option>
            @foreach ($gambar as $g)
            <option value="{{ $g->judul }}">
                {{ $g->judul }}
            </option>
            @endforeach
        </select>

        <label for="">Tanggal Pinjam</label>
        <input class="form-control" name="tanggal_dipinjam" id="tanggal_dipinjam" type="date" placeholder="Default input" aria-label="default input example">

        <label for="">Tanggal Pengembalian</label>
        <input class="form-control" name="tanggal_dikembalikan" id="tanggal_dikembalikan" type="date" placeholder="Default input" aria-label="default input example">

        <button type="submit" class="btn btn-primary" onclick="console.log('Form diklik')">
            Simpan Data
        </button>
    </form>
</div>
@endsection -->