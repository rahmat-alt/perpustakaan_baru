@extends('dashboard.dashboard-view')

@section('userhi')

<div class="container pt-3">
    <h1> hero info</h1>
    <!-- <div class="btn-add p-3">
        <a href="{{ url('userhi/create') }}">
            <button class="btn btn-primary pt-3"> Tambah Informasi</button></a>
    </div> -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Website</th>
                <th scope="col">Pre Title</th>
                <th scope="col">Judul</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>


        </thead>
        <tbody>
            @foreach($heroinfo as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{ $item->phone_number}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
                <td>{{$item->website}}</td>
                <td>{{$item->pre_title}}</td>
                <td>{{$item->judul}}</td>
                <td>{{$item->deskripsi}}</td>
                <td>
                    <a href="{{ route('userhi.edit', $item->id) }}">
                        <button class="btn btn-warning"><i class="bi bi-pen"></i></button>
                    </a>
                    <a href="{{url('/userhi-destroy/destroy/'.$item->id)}}">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
