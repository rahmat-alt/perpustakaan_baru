@extends('dashboard.dashboard-view')

@section('buku')
<div class="container pt-5">
    <div class="row">
        <!-- /.card-header -->

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th style="width: 40px">Penulis</th>
                    <th style="width: 40px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gambar as $g)
                <tr class="align-middle">
                    <td>1</td>
                    <td>{{ $g->gambar }}</td>

                    <td>{{ $g->judul }}</td>

                    <td>{{ $g->penulis }}</td>
                    <td>
                        <button>edit</button>
                        <button>hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-end pt-5">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </div>
</div>
</div>

<div class="container">
    <div class="card-body">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br />
            @endforeach
        </div>
        @endif


        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Edit Data Buku</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action=" {{ url('/perpustakaan/proses') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="judul" class="form-label">judul</label>
                    <input
                        type="text"
                        class="form-control"
                        id="judul"
                        name="judul">
                    <div id="judul" class="form-text">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">penulis</label>
                    <input
                        type="text"
                        class="form-control"
                        id="peulis"
                        name="penulis">
                    <div id="penulis" class="form-text">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="foto" name="foto">
                    <label class="input-group-text" for="foto">Upload</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer pt-3 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Quick Example-->
</div>
</div>

@endsection