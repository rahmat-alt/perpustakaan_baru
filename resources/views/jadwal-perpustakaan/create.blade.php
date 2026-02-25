@extends('dashboard.dashboard-view')

@section('jadwal-create')

<div class="container">
    <form action="{{ route('jadwal.store') }}" method="post">
        @csrf

        <div class="title p-3">
            <h3>Tambah Jadwal</h3>
        </div>

        <label for="hari"> Hari</label>
        <div class="form-group">
            <label for="hari">Hari</label>
            <select name="hari" id="hari" class="form-control">
                <option value="">-- Pilih Hari --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
            </select>
        </div>


        <label for="jam">Jam</label>
        <input type="time" name="jam" class="form-control mb-2">

        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" class="form-control mb-2" placeholder="Keterangan">

        <label for="tutup">Jam Tutup</label>
        <input type="time" name="tutup" class="form-control mb-2" placeholder="tutup">


        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
