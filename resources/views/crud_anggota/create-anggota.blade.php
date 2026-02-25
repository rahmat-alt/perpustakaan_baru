@extends('dashboard.dashboard-view')

@section('create-anggota')
<div class="container">

    <!--begin::Quick Example-->
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title"> Data Anggota</div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="/anggota/proses" method="post">
        @csrf
        <!--begin::Body-->
        <div class="card-body">

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">No Anggota</label>
                <input type="text" class="form-control" id="no_anggota" name="no_anggota" " />
            </div>

            <div class=" mb-3">
                <label for="exampleInputtelp" class="form-label">Nama Anggota</label>
                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" />
            </div>

            <div class="mb-3">
                <label for="exampleInputtelp" class="form-label">Alamat Anggotaa</label>
                <input type="text" class="form-control" id="alamat" name="alamat"" />
            </div>

            <div class=" mb-3">
                <label for="exampleInputtelp" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" />
            </div>

            <div class=" mb-3">
                <label for="exampleInputtelp" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" />
            </div>
        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer text-center pb-4">
            <button type="submit" class="btn btn-primary" onclick="console.log('Form diklik')">
                Simpan
            </button>
        </div>
        <!--end::Footer-->
    </form>
    <!--end::Form-->

    <!--end::Quick Example-->
</div>
@endsection