<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
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

        <form action="{{ route('user/ubah') }}" method="POST">
            @csrf

            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-12 text-center">
                    <h3>Ubah Password User</h3>

                    <label>Email User</label>
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
                        <a onclick="window.history.back();"
                            class="btn btn-warning m-1"
                            data-toggle="tooltip"
                            aria-label="Cancel"
                            data-coreui-original-title="Cancel">
                            Kembali
                        </a>

                    </div>
                </div>
            </div>
        </form>
    </div>
