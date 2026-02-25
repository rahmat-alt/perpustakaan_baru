<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container pt-5 pb-5">
        <h1>Tambah Data Peminjam</h1>

        <form action="{{url('/tambah/store')}}" method="post">
            @csrf
            <div class="container">
                <Label>Nama Peminjam</Label>
                <input type="text"
                    value="{{ auth()->user()->name }}"
                    class="form-control"
                    readonly>


                <Label>No Peminjam</Label>
                <input type="text"
                    value="{{ auth()->user()->no_anggota }}"
                    class="form-control"
                    readonly>

                <label>Judul Buku</label>
                <input type="text"
                    name="judul_buku"
                    class="form-control"
                    value="{{ $buku->judul }}"
                    readonly>


                <label for="" class="pb-2 pt-2">Tanggal Pinjam</label>
                <input class="form-control" name="tanggal_dipinjam" id="tanggal_dipinjam" type="date" placeholder="Default input" aria-label="default input example">

                <label for="" class="pb-2 pt-2">Tanggal Pengembalian</label>
                <input class="form-control" name="tanggal_dikembalikan" id="tanggal_dikembalikan" type="date" placeholder="Default input" aria-label="default input example">
                <div class="pt-5 text-center">
                    <button type="submit" class="btn btn-primary " onclick="console.log('Form diklik')">
                        Simpan Data
                    </button>
                </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>