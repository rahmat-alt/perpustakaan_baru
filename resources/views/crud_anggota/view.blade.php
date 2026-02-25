@extends('dashboard.dashboard-view')

@section ('view-anggota')
<div class="container">
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
                <h3>Data Anggota</h3>
            </div>
            <div class="btn-create p-3">
                <a href="{{url('/anggota/tambah')}}">
                    <button type="button" class="btn btn-primary">Tambah Anggota</button></a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Anggota</th>
                        <th>Nama Anggota</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @foreach($anggota as $angt)
                <tbody>
                    <tr class="align-middle">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$angt->no_anggota}}</td>
                        <td>{{$angt->nama_anggota}}</td>
                        <td>{{$angt->alamat}}</td>
                        <td>{{$angt->email}}</td>
                        <td>{{$angt->no_telp}}</td>
                        <td>
                            <a href="{{url('/anggota/hapus/'.$angt->id)}}">
                                <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                            <a href="{{url('/anggota/edit/'.$angt->id)}}">
                                <button class="btn btn-warning"><i class="bi bi-pen"></i></button></a>
                        </td>
                    </tr>

                </tbody>
                @endforeach
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
@endsection
