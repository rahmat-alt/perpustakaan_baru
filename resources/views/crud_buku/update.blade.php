@extends('dashboard.dashboard-view')

@section('update')


<div class="container">

    <div class="title pb-2">
        <h3>Data Buku</h3>
    </div>

    <div class="btn-create pb-3">
        <a href="{{url('/perpustakaan')}}">
            <button type="button" class="btn btn-primary">Tambah Data Buku</button></a>
    </div>

    <div class="row">
        <!-- /.card-header -->

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th style="width: 40px">Penulis</th>
                    <th style="width: 40px">Stok</th>
                    <th style="width: 40px">status</th>
                    <th style="width: 40px">Dipinjam</th>
                    <th style="width: 40px">Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($gambar as $item)

                <tr class="align-middle">
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('data_file/' . $item->foto) }}"
                            alt="gambar buku"
                            width="100">
                    </td>

                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->penulis }}</td>
                    <td>{{ $item->stok }}</td>

                    <td>
                        <span class="badge rounded-pill px-3 py-2 fw-semibold
                                 {{ $item->status == 'tersedia' ? 'bg-success-subtle text-success-emphasis'  : 'bg-secondary-subtle text-secondary-emphasis' }}">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>

                    <td>{{ $item->dipinjam }}</td>

                    <td>
                        <form action="/hapus/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
