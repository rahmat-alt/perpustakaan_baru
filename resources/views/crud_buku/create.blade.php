@extends('dashboard.dashboard-view')

@section('show')
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

                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="" disabled selected>Pilih status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak tersedia">Tidak Tersedia</option>
                </select>

                <div class="mb-3">
                    <label for="penulis" class="form-label">stok</label>
                    <input
                        type="text"
                        class="form-control"
                        id="stok"
                        name="stok">
                    <div id="stok" class="form-text">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">dipinjam</label>
                    <input
                        type="text"
                        class="form-control"
                        id="dipinjam"
                        name="dipinjam">
                    <div id="dipinjam" class="form-text">
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