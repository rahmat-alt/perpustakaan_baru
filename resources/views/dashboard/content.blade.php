@extends('dashboard.dashboard-view')

@section('content')
<div class="container">

    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0" style=color:black>Dashboard Admin Perpustakaan</h3>
                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->

                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 1-->
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>{{$totalStok}}</h3>
                                <p>Stok</p>
                            </div>
                            <svg
                                class="small-box-icon"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24" width="25" height="25">
                                    <path d="M4 3h13a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2zm0 2v14h13V5H4zm3 2h6v2H7V7zm0 4h6v2H7v-2z">
                                </svg>

                            </svg>

                        </div>
                        <!--end::Small Box Widget 1-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 2-->
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>{{$totalDipinjam}}</h3>
                                <p>Dipinjam</p>
                            </div>
                            <svg
                                class="small-box-icon"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path
                                    d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"></path>
                            </svg>

                        </div>
                        <!--end::Small Box Widget 2-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 3-->
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>{{ $dikembalikan }}</h3>
                                <p>dikembalikan</p>
                            </div>
                            <svg
                                class="small-box-icon"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24">
                                    <path d="M9 7l-5 5 5 5V13h6a4 4 0 010 8h-1v2h1a6 6 0 000-12H9V7z" />
                                </svg>
                            </svg>

                        </div>
                        <!--end::Small Box Widget 3-->
                    </div>
                    <!--end::Col-->
                    <div class="col-lg-3 col-6">
                        <!--begin::Small Box Widget 4-->
                        <div class="small-box text-bg-danger">
                            <div class="inner">
                                <h3>{{ $belumDikembalikan }}</h3>
                                <p>Belum Dikembalikan</p>
                            </div>
                            <svg
                                class="small-box-icon"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="25">
                                    <path d="M5 3h10a2 2 0 012 2v4h-2V5H5v14h10v-4h2v4a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm9.59 6L17 11.41V8h2v6h-6v-2h3.41z" />
                                </svg>

                            </svg>

                        </div>
                        <!--end::Small Box Widget 4-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 connectedSortable">
                        <div class="card mb-4">

                            <div class="card-body">
                                <div id="revenue-chart"></div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>

                </div>
                <!-- /.row (main row) -->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
</div>

<!-- script js chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        var chartBukuLabels = @json($chartBukuLabels ?? []);
        var chartBukuData = @json($chartBukuData ?? []);

        var options = {
            chart: {
                type: 'bar',
                height: 350
            },
            series: [{
                name: 'Jumlah Dipinjam',
                data: chartBukuData
            }],
            xaxis: {
                categories: chartBukuLabels
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 6
                }
            },
            dataLabels: {
                enabled: true
            },
            title: {
                text: 'Buku Yang Paling Sering Dipinjam',
                align: 'center'
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#revenue-chart"),
            options
        );

        chart.render();
    });
</script>

@endsection
