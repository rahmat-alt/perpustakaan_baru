@extends('dashboard.dashboard-view')

@section('create-info')

@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
</div>
@endif

<form action="{{route('info-card.store')}}" method="post">
    @csrf
    <div class="container">

        <div class="title-edit">
            <h2>edit informasi</h2>
        </div>
        <label for="No Telpon">No Telpon</label>
        <input type="text" name="phone_number" class="form-control mb-2">

        <label for="">Email</label>
        <input type="Email" name="email" class="form-control mb-2">

        <label for="">Alamat</label>
        <input type="text" name="address" class="form-control mb-2">

        <label for="">Website</label>
        <input type="text" name="website" class="form-control mb-2">


        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

@endsection
