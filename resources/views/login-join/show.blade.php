@extends('dashboard.dashboard-view')

@section('loginjoin')
<div class="container">

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
                <h3 class="card-title">Table User Login</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th style="width: 40px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $index => $u)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration + ($user->currentPage() - 1) * $user->perPage() }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                <form action="{{ route('loginjoin-destroy', $u->id) }}" method="POST" style="display:inline;">
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

                {{-- Pagination dengan gap dan "Showing ..." --}}
                <div class="pagination-container px-3 pb-3">
                    <div class="pagination-summary">
                        Showing {{ $user->firstItem() }} to {{ $user->lastItem() }} of {{ $user->total() }} results
                    </div>
                    <div class="card-tools">
                        {{ $user->links() }}
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        let alert = document.querySelector('.auto-hide');
        if (alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 3000);
</script>

@endsection
