@extends('dashboard.dashboard-view')

@section('update')
<div class="container pt-5">

    {{-- ALERT CSS --}}
    <style>
        .card-tools .pagination>li.page-item:not(:last-child) {
            margin-right: 0.5rem;
        }

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

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Data Pengembalian</h3>
        </div>

        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Dipinjam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengembalian as $g)
                    <tr class="align-middle">
                        <th scope="row">{{ $loop->iteration + ($pengembalian->currentPage() - 1) * $pengembalian->perPage() }}</th>
                        <td>
                            <img src="{{ asset('data_file/' . $g->foto) }}" alt="gambar buku" width="100">
                        </td>
                        <td>{{ $g->judul }}</td>
                        <td>{{ $g->penulis }}</td>
                        <td>{{ $g->stok }}</td>
                        <td>
                            <span class="badge rounded-pill px-3 py-2 fw-semibold
                                {{ $g->status == 'tersedia' ? 'bg-success-subtle text-success-emphasis' : 'bg-secondary-subtle text-secondary-emphasis' }}">
                                {{ ucfirst($g->status) }}
                            </span>
                        </td>
                        <td>{{ $g->dipinjam }}</td>
                        <td>
                            <form action="{{ url('/hapus/' . $g->id) }}" method="POST" style="display:inline;">
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

            {{-- Pagination --}}
            <div class="pagination-container px-3 pb-3 d-flex justify-content-between align-items-center">
                <div class="pagination-summary">
                    Showing {{ $pengembalian->firstItem() }} to {{ $pengembalian->lastItem() }} of {{ $pengembalian->total() }} results
                </div>
                <div class="card-tools">
                    {{ $pengembalian->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
