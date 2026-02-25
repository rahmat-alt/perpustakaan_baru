@extends('dashboard.dashboard-view')

@section('content')
<div class="container">
    <h3>Berita Perpustakaan</h3>

    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">
        Tambah Berita
    </a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{ asset('data_file/'.$item->gambar) }}" alt="gambar" width="80">
                </td>

                <td>{{ $item->judul }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <form action="{{ route('berita.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    </form>

                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pen"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
