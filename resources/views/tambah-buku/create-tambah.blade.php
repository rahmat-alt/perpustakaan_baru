@extends('dashboard.dashboard-view')

@section('tampil-buku')
<div class="container">

    <div class="container pt-4">

        {{-- ALERT CSS --}}
        <style>
            /* Jarak antar item pagination */
            .card-tools .pagination>li.page-item:not(:last-child) {
                margin-right: 0.5rem;
            }

            /* Gap antara teks "Showing ..." dan pagination */
            .pagination-container {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .pagination-container .pagination-summary {
                margin-right: 1.5rem;
            }
        </style>

        {{-- ALERT SUCCESS --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- ALERT DELETE --}}
        @if(session('deleted'))
        <div class="alert alert-warning alert-dismissible fade show auto-hide" role="alert">
            <strong>Dihapus!</strong> {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        {{-- ALERT ERROR --}}
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Terjadi Kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="container pt-3">

            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Data Buku Pinjaman</h3>
                </div>

                <!-- /.card-header -->
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Peminjam</th>
                            <th>Nomor Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Dipinjam</th>
                            <th>Tanggal Dikembalikan</th>
                            <th style="width: 40px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tambah as $tb)
                        <tr>
                            <th scope="row">{{ $loop->iteration + ($tambah->currentPage() - 1) * $tambah->perPage() }}</th>
                            <td>{{ $tb->nama_peminjam }}</td>
                            <td>{{ $tb->nomor_anggota }}</td>
                            <td>{{ $tb->judul_buku }}</td>
                            <td>{{ $tb->tanggal_dipinjam }}</td>
                            <td>{{ $tb->tanggal_dikembalikan }}</td>
                            <td>
                                <form action="{{ url('/tambah/hapus/'.$tb->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau hapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-container px-3 pb-3 d-flex justify-content-between align-items-center">
                    <div class="pagination-summary">
                        Showing {{ $tambah->firstItem() }} to {{ $tambah->lastItem() }} of {{ $tambah->total() }} results
                    </div>
                    <div class="card-tools">
                        {{ $tambah->links() }}
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
</div>
@endsection
