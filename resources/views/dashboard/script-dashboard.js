  <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
        src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(
                SELECTOR_SIDEBAR_WRAPPER
            );
            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
        src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
        integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
        crossorigin="anonymous"></script>
    <!-- sortablejs -->
    <script>
        new Sortable(document.querySelector(".connectedSortable"), {
            group: "shared",
            handle: ".card-header",
        });

        const cardHeaders = document.querySelectorAll(
            ".connectedSortable .card-header"
        );
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = "move";
        });
    </script>
    <!-- apexcharts -->
    <script
        src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
        crossorigin="anonymous"></script>
    <!-- ChartJS -->
  <script>
const chartLabels = {!! json_encode($chartLabels ?? []) !!};
const chartData   = {!! json_encode($chartData ?? []) !!};


const totalBuku = chartData.reduce((a,b) => a+b, 0);

const options = {
    series: chartData,
    chart: { type: 'donut', width: 380 },
    labels: chartLabels,
    colors: ["#FB923C","#7d89a0" ],
    legend: { position: 'bottom' },
    dataLabels: { enabled: true, style: { fontSize: '16px', fontWeight: 'bold' } },
    plotOptions: {
        pie: {
            donut: {
                size: '65%',
                labels: {
                    show: true,
                    total: { show: true, label: 'Total Buku', formatter: () => totalBuku + ' buku' }
                }
            }
        }
    },
    tooltip: { y: { formatter: val => val + " buku" } }
};

const chart = new ApexCharts(document.querySelector("#revenue-chart"), options);
chart.render();
</script>

    <!-- jsvectormap -->
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
        integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
        integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
        crossorigin="anonymous"></script>
    <!-- jsvectormap -->
    <script>
        // World map by jsVectorMap
        new jsVectorMap({
            selector: "#world-map",
            map: "world",
        });

        // Sparkline charts
        const option_sparkline1 = {
            series: [{
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline1 = new ApexCharts(
            document.querySelector("#sparkline-1"),
            option_sparkline1
        );
        sparkline1.render();

        const option_sparkline2 = {
            series: [{
                data: [
                    515, 519, 520, 522, 652, 810, 370, 627, 319, 630,
                    921,
                ],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline2 = new ApexCharts(
            document.querySelector("#sparkline-2"),
            option_sparkline2
        );
        sparkline2.render();

        const option_sparkline3 = {
            series: [{
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            }, ],
            chart: {
                type: "area",
                height: 50,
                sparkline: {
                    enabled: true,
                },
            },
            stroke: {
                curve: "straight",
            },
            fill: {
                opacity: 0.3,
            },
            yaxis: {
                min: 0,
            },
            colors: ["#DCE6EC"],
        };

        const sparkline3 = new ApexCharts(
            document.querySelector("#sparkline-3"),
            option_sparkline3
        );
        sparkline3.render();
    </script>
    <!--end::Script-->



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
    </div>

    <div class="app-wrapper">
        <!--begin::Scripts-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>

        <!-- AdminLTE JS (INI YANG PALING PENTING) -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        <!--end::Scripts-->
</body>
<!--end::Body-->

</html>
