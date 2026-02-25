@extends('dashboard.dashboard-view')

@section('jadwal-edit')

<div class="container">

    <h3 class=" pt-5 pb-3">Edit Jadwal</h3>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="post">
        @csrf


        <input type="hidden" name="id" value='{{$jadwal->id}}'>
        <input type="text" name="hari" class="form-control mb-2" value='{{$jadwal->hari}}' placeholder="Hari">

        <input type="time" name="jam" class="form-control mb-2" value='{{$jadwal->jam}}'>
        <input type="time" name="tutup" class="form-control mb-2" value='{{$jadwal->tutup}}'>
        <input type="text" name="keterangan" class="form-control mb-2" value='{{$jadwal->keterangan}}' placeholder="Keterangan">
        <div class="btn-submit pt-5">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection