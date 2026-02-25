@extends('dashboard.dashboard-view')

@section('petugas')
<div class="container">
    @if (session('danger'))
    <x-alert type="danger" :message="session('danger')" />
    @endif

    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif
    <div class="row">
        <!-- /.card-header -->
        <div class="title">
            <h3>Data Petugas</h3>
        </div>
        <div class="btn-create p-3">
            <a href="{{url('/petugas/tambah')}}">
                <button type="button" class="btn btn-primary">Tambah Petugas</button></a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Petugas</th>
                    <th>Nama Petugas</th>
                    <th>No Telpon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugas as $p)

                <tr class="align-middle">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->id}}</td>
                    <td>{{$p->nama_petugas}}</td>
                    <td>{{$p->no_telp}}</td>
                    <td>

                        <a href="{{url('/petugas/hapus/'.$p->id)}}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>


                        <a href="{{url('/petugas/edit/'.$p->id)}}">
                            <button class="btn btn-warning"><i class="bi bi-pen"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
