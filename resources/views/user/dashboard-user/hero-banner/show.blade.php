@extends('dashboard.dashboard-view')

@section('show-hero')
<div class="container">
    <h2>Hero Banner</h2>
    <div class="btn-add">
        <a href="{{ url('/hero-banner/create') }}">
            <button class="btn btn-primary pt-3"> Tambah Informasi</button></a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Pre Title</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope='col'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hero as $hero)
            <tr>
                <th scope="row">1</th>
                <td>{{ $hero->pre_title}}</td>
                <td>{{$hero->judul}}</td>
                <td>{{$hero->deskripsi}}</td>
                <td>
                    <a href="{{url('/hero-banner/destroy/'.$hero->id)}}">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                    <a href="{{ url('hero-banner/edit', $hero->id) }}">
                        <button class="btn btn-warning"><i class="bi bi-pen"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
