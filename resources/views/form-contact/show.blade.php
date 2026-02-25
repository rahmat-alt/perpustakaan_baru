@extends('dashboard.dashboard-view')

@section('form-contact')
<div class="container">
    {{-- Alert Success --}}

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- DELETE ALERT --}}
    @if(session('deleted'))
    <div class="alert alert-warning auto-hide-3s">
        <strong>Dihapus!</strong> {{ session('deleted') }}
    </div>
    @endif

    {{-- Alert Error --}}
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }} <br>
        @endforeach
    </div>
    @endif

    <h2>Form Contact</h2>

    <!-- <div class="btn-add">
        <a href="{{ route('form-create') }}">
            <button class="btn btn-primary "> Tambah Informasi</button></a>
    </div> -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        @foreach($form as $form)
        <tbody>
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$form->nama}}</td>
                <td>{{$form->email}}</td>
                <td>{{$form->subject}}</td>
                <td>{{$form->message}}</td>
                <td>
                    <a href="{{url('/form-contact/destroy/'.$form->id)}}">
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button></a>

                    <!-- <a href="{{ route('form.edit', $form->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i>
                    </a> -->

                </td>
            </tr>

        </tbody>
        @endforeach
    </table>
</div>
@endsection