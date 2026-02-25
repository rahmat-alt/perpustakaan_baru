@extends('dashboard.dashboard-view')

@section('card')
<div class="container">
    <h2>Card User</h2>
    <a href="{{ route('card-create') }}" class="btn btn-primary mb-3">
        Tambah Berita
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($card1 as $card)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $card->nama}}</td>
                <td>{{$card->judul}}</td>
                <td>{{$card->deskripsi}}</td>
                <td>
                    <img src="{{ asset('images/service/'.$card->gambar) }}"
                        width="120px"
                        height="120px"
                        class="img-thumbnail">
                </td>
                <td>

                    <a href="{{ route('destroy', $card->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
</div>
@endsection
