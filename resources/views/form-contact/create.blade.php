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

    <h2>Create Form Contact</h2>

    <form action="{{route('form-store')}}" method="post">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control mb-2">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control mb-2">

        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control mb-2">

        <label for="message">Message</label>
        <input type="text" name="message" id="message" class="form-control mb-2">

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
