@extends('dashboard.dashboard-view')

@section('create-petugas')
<div class="container">

    <!--begin::Quick Example-->
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Edit Data Petugas</div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    <form action="/petugas/proses" method="post">
        @csrf
        <!--begin::Body-->
        <div class="card-body">

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control" id="exampleInputname" name="nama_petugas" id="nama_petugas" />
            </div>

            <div class="mb-3">
                <label for="exampleInputtelp" class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control" id="exampleInputtelp" name="no_telp" id="no_telp" />
            </div>

        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer text-center">

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