@extends('dashboard.dashboard-view')

@section('hero')

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
</div>
@endif
<div class="container">
    <form action="{{route('hero-banner.store')}}" method="post">
        @csrf
        <h2>Tambah Hero</h2>

        <label for="pre_title">Pre Title</label>
        <input type="text" name="pre_title" class="form-control mb-2">

        <label for="">Judul</label>
        <input type="text" name="judul" class="form-control mb-2">

        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Simpan</button>
</div>
</form>

@endsection
