@extends('dashboard.dashboard-view')

@section('card')

<div class="container">

    @if (session('danger'))
    <x-alert type="danger" :message="session('danger')" />
    @endif

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif

    <h2>Card User</h2>

    <form action="{{ route('card.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Nama</label>
        <input type="text" name="nama" class="form-control mb-2">

        <label>Judul</label>
        <input type="text" name="judul" class="form-control mb-2">

        <label>Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control mb-2">

        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection
