@extends('dashboard.dashboard-view')

@section('jadwal-perpustakaan')
<div class="container pt-3">
    <h1>jadwal perpustakaan</h1>
    <div class="btn-add p-3">
        <a href="{{ route('jadwal.create') }}">
            <button class="btn btn-primary"> Tambah Jadwal</button></a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Jam</th>
                <th scope="col">Tutup</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $jd)
            <tr>
                <th scope="row">1</th>
                <td>{{ $jd->hari}}</td>
                <td>{{$jd->jam}}</td>
                <td>{{$jd->tutup}}</td>
                <td>{{$jd->keterangan}}</td>
                <td>
                    <a href="{{url('/jadwal/edit/'.$jd->id)}}">
                        <button class="btn btn-warning"><i class="bi bi-pen"></i></button></a>
                    <a href="{{url('/jadwal/'.$jd->id)}}">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection