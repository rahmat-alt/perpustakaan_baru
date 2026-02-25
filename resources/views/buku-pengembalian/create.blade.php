@extends('dashboard.dashboard-view')

@section('create-pengembalian')
@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
</div>
@endif

<div class="container">
    <!-- Header -->
    <div class="card-header">
        <div class="card-title">Edit Data Pengembalian</div>
    </div>

    <!-- Form -->
    <form action="/pengembalian/store" method="post">
        @csrf

        <div class="card-body">

            <!-- No Anggota -->
            <div class="mb-3">
                <label for="user_id" class="form-label">No Anggota</label>
                <select class="form-control" id="no_anggota" name="no_anggota" required>
                    <option value="">-- Pilih No Anggota --</option>
                    @foreach ($user as $us)
                    <option value="{{ $us->id }}">
                        {{ $us->no_anggota}}
                    </option>
                    @endforeach
                </select>
            </div>

            <select name="buku_id" id="buku_id" class="form-control" required>
                <option value="">-- Pilih Judul Buku --</option>
                @foreach ($gambars as $b)
                <option value="{{ $b->id }}">
                    {{ $b->judul}}
                </option>
                @endforeach
            </select>

            <!-- Tanggal Pengembalian -->
            <div class="mb-3">
                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                <input type="date"
                    class="form-control"
                    id="tanggal_pengembalian"
                    name="tanggal_pengembalian"
                    required>
            </div>

        </div>

        <!-- Footer -->
        <div class="card-footer text-center pb-4">
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>

    </form>
</div>
@endsection