@extends('dashboard.dashboard-view')

@section('edit-petugas')
<div class="container">

    <!--begin::Quick Example-->
    <!--begin::Header-->
    <div class="card-header">
        <div class="card-title">Edit Data Petugas</div>
    </div>
    <!--end::Header-->
    <!--begin::Form-->
    @foreach($petugas as $p)
    <form action="/petugas/update" method="post">
        @csrf
        <!--begin::Body-->
        <div class="card-body">
            <input type="hidden" name="id" id="id" value="{{$p->id}}">

            <div class="mb-3">
                <label for="exampleInputname" class="form-label">Nama Petugas</label>
                <input type="text" class="form-control" id="exampleInputname" name="nama_petugas" id="nama_petugas" value="{{$p->nama_petugas}}" />
            </div>

            <div class="mb-3">
                <label for="exampleInputtelp" class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control" id="exampleInputtelp" name="no_telp" id="no_telp" value="{{$p->no_telp}}" />
            </div>

        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer text-center">

            <button type="submit" value="simpan-data" class="btn btn-primary" onclick="console.log('Form diklik')">
                Simpan Data
            </button>

        </div>
        <!--end::Footer-->
    </form>
    @endforeach
    <!--end::Form-->
    <!--end::Quick Example-->
</div>
@endsection