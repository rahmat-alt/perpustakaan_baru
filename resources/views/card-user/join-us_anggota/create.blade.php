<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="/anggota/proses" method="post">
            @csrf
            <!--begin::Body-->
            <div class="card-body">

                <div class="mb-3">
                    <label for="exampleInputname" class="form-label">No Anggota</label>
                    <input type="text" class="form-control" id="no_anggota" name="no_anggota" " />
            </div>

            <div class=" mb-3">
                    <label for="exampleInputtelp" class="form-label">Nama Anggota</label>
                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" />
                </div>

                <div class="mb-3">
                    <label for="exampleInputtelp" class="form-label">Alamat Anggotaa</label>
                    <input type="text" class="form-control" id="alamat" name="alamat"" />
            </div>

            <div class=" mb-3">
                    <label for="exampleInputtelp" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" />
                </div>

                <div class=" mb-3">
                    <label for="exampleInputtelp" class="form-label">No Telpon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" />
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer text-center pb-4">
                <button type="submit" class="btn btn-primary" onclick="console.log('Form diklik')">
                    Simpan
                </button>
            </div>
            <!--end::Footer-->
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>