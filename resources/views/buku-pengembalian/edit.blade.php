@extends('dashboard.dashboard-view')

@section('edit-pengembalian')
<div class="container">

    <!--begin::Quick Example-->
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Edit Data pengembalian</div>
    </div>
    <!--end::Header-->

    <!--begin::Form-->
    <form action="/pengembalian/update" method="post">
        @csrf
        <!--begin::Body-->
        <div class="card-body">
            <input type="hidden" name="id" id="id" value="{{ $pengembalian->id }}">

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">No Anggota</label>
                <input type="text" class="form-control" id="no_anggota" name="no_anggota" value="{{$pengembalian->no_anggota}}" />
            </div>

            <div class=" mb-3">
                <label for="exampleInputtelp" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{$pengembalian->judul_buku}}" />
            </div>

            <div class="mb-3">
                <label for="exampleInputtelp" class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{$pengembalian->tanggal_pengembalian}}" />
            </div>

        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer text-center pb-4">
            <button type="submit" class="btn btn-primary" onclick="console.log('Form diklik')">
                Simpan Data
            </button>
        </div>
        <!--end::Footer-->
    </form>
    <!--end::Form-->

    <!--end::Quick Example-->
</div>
@endsection
