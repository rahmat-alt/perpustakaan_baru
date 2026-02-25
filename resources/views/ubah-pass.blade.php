@extends('dashboard.dashboard-view')

@section('ubah-pass')

<div class="container py-4">
    {{-- Pesan sukses --}}
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    {{-- Pesan error --}}
    @if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Ubah Password</h3>
    <form action="{{ route('ubah') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email"
            value="{{ auth()->user()->email }}"
            class="form-control"
            readonly>

        <label class="pt-3">Password Lama</label>
        <input type="password"
            name="old_password"
            placeholder="Password Lama"
            class="form-control @error('old_password') is-invalid @enderror">

        <label class="pt-3">Password Baru</label>
        <input type="password"
            name="new_password"
            placeholder="Password Baru"
            class="form-control @error('new_password') is-invalid @enderror">

        <label class="pt-3">Konfirmasi Password Baru</label>
        <input type="password"
            name="new_password_confirmation"
            placeholder="Konfirmasi Password Baru"
            class="form-control">

        <div class="text-center pt-5">
            <button type="submit" class="btn btn-primary">
                Ganti Password
            </button>
        </div>
    </form>
</div>

@endsection
