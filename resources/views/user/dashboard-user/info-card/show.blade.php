@extends('dashboard.dashboard-view')

@section('show-info')
<div class="container pt-3">
    <h1>jadwal perpustakaan</h1>
    <div class="btn-add p-3">
        <a href="{{ url('info-card/create') }}">
            <button class="btn btn-primary pt-3"> Tambah Informasi</button></a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Website</th>
            </tr>


        </thead>
        <tbody>
            @foreach($info as $info)
            <tr>
                <th scope="row">1</th>
                <td>{{ $info->phone_number}}</td>
                <td>{{$info->email}}</td>
                <td>{{$info->address}}</td>
                <td>{{$info->website}}</td>
                <td>
                    <a href="{{ route('info-card.edit', $info->id) }}">
                        <button class="btn btn-warning"><i class="bi bi-pen"></i></button>
                    </a>
                    <a href="{{url('/info-card/destroy/'.$info->id)}}">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
