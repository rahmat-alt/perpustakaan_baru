@extends('dashboard.dashboard-view')

@section('hero')

<div class="container">

    <form action="{{ url('/hero-banner/update/' . $hero->id) }}" method="post">
        @csrf
        <h2>edit hero</h2>
        <input type="hidden" name="id" value='{{$hero->id}}'>
        <label for="pre_title">Pre Title</label>
        <input type="text" name="pre_title" value="{{$hero->pre_title}}" class="form-control mb-2">

        <label for="">Judul</label>
        <input type="text" name="judul" value="{{$hero->judul}}" class="form-control mb-2">

        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" value="{{$hero->deskripsi}}" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Simpan</button>

</div>
@endsection
