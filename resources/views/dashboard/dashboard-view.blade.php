<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE v4 | Dashboard</title>

    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard" />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!--end::Third Party Plugin-->

    <!--begin::AdminLTE CSS-->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!--end::AdminLTE CSS-->

    <!-- ApexCharts -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />

    <!-- jsvectormap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<!--end::Head-->

<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        <!--begin::Header-->
        @include('dashboard.header')
        <!--end::Header-->

        <!--begin::Sidebar-->
        @include('dashboard.sidebar')
        <!--end::Sidebar-->

        <!--begin::App Main-->
        @yield('content')
        <!--end::App Main-->

        <!-- begin :: ubah-pass -->
        @yield('ubah-pass')
        <!-- end :: ubah-pass -->

        <!-- begin :: update -->
        @yield('update')
        <!-- end :: update -->

        <!-- begin :: buku -->
        @yield('buku')
        <!-- end :: buku -->

        <!-- begin::petugas -->
        @yield('petugas')
        <!-- end::petugas -->

        <!-- begin::create-petugas -->
        @yield('create-petugas')
        <!-- end::create-petugas -->

        <!-- begin::edit-petugas -->
        @yield('edit-petugas')
        <!-- end::edit-petugas -->

        <!-- begin::anggota -->
        @yield('view-anggota')
        <!-- end::anggota -->

        <!-- begin::edit-anggota -->
        @yield('edit-anggota')
        <!-- end::edit-anggota -->

        <!-- begin::create-anggota -->
        @yield('create-anggota')
        <!-- end::create-anggota -->

        <!--begin::Footer-->
        @include('dashboard.footer')
        <!--end::Footer-->

        <!-- begin::create-buku -->
        @yield('tampil-buku')
        <!-- end :: create-buku -->

        @yield('show')

        <!-- begin::pengembalian-buku -->
        @yield('main-pengembalian')
        <!-- end::pengembalian-buku -->

        <!--begin::tambah pengembalian -->
        @yield('create-pengembalian')
        <!-- end ::tambah pengembalian -->

        <!-- begin::edit pengembalian -->
        @yield('edit-pengembalian')
        <!-- end ::edit pengembalian -->

        <!-- begin::jadwal perpustakaan -->
        @yield('jadwal-perpustakaan')
        <!-- end ::jadwal perpustakaan -->

        <!-- begin::berita perpustakaan -->
        @yield('berita-perpustakaan')
        <!-- end ::berita perpustakaan -->
        <!-- begin::edit berita -->
        @yield('edit-content')
        <!-- end ::edit berita -->
        <!-- begin::create jadwal -->
        @yield('jadwal-create')
        <!-- end ::create jadwal -->
        <!-- begin::edit jadwal -->
        @yield('jadwal-edit')
        <!-- end ::edit jadwal -->

        <!-- begin::info-card -->
        @yield('show-info')
        <!-- end::info-card -->
        <!-- create info -->
        @yield('create-info')
        <!-- end create info -->

        <!-- begin::create-hero -->
        @yield('service')
        <!-- end::create-hero -->

        <!-- begin::create-hero -->
        @yield('hero')
        <!-- end::create-hero -->

        <!-- begin::edit info -->
        @yield('edit-info')
        <!-- end ::edit info -->
        <!-- begin::info-hero -->
        @yield('show-hero')
        <!-- end ::info-hero -->

        <!-- userhi -->
        @yield('userhi')
        <!-- end userhi -->

        <!-- begin::card-user -->
        @yield('card')
        <!-- end::card-user -->

        <!-- begin::form-contact -->
        @yield('form-contact')
        <!-- end::form-contact -->

        <!-- loginjoin -->
        @yield('loginjoin')
        <!-- end loginjoin -->

    </div>

    <!--begin::Scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>

    <!-- AdminLTE JS (INI YANG PALING PENTING) -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!--end::Scripts-->

</body>
<!--end::Body-->

</html>
