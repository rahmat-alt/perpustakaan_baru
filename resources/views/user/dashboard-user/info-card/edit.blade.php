@extends('dashboard.dashboard-view')

@section('edit-info')
@if(count($errors) > 0)
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br />
    @endforeach
</div>
@endif


<form action="{{ url('/info-card/update', $info->id) }}" method="POST">
    @csrf
    <div class="container">

        <div class="title-edit">
            <h2>edit informasi</h2>
        </div>
        <input type="hidden" name="id" value='{{$info->id}}'>
        <label for="No Telpon"></label>
        <input type="text" name="phone_number" class="form-control mb-2" value="{{$info->phone_number}}" required>

        <label for="">Email</label>
        <input type="Email" name="email" class="form-control mb-2" value="{{$info->email}}" required>

        <label for="">Alamat</label>
        <input type="text" name="address" class="form-control mb-2" value="{{$info->address}}" required>

        <label for="">Website</label>
        <input type="text" name="website" class="form-control mb-2" value="{{$info->website}}" required>


        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
