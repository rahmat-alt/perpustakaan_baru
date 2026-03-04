@extends('dashboard.dashboard-view')

@section('content')

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0 text-dark">Dashboard Admin Perpustakaan</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            {{-- ROW BOX STATISTIK --}}
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $totalStok }}</h3>
                            <p>Stok</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $totalDipinjam }}</h3>
                            <p>Dipinjam</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $dikembalikan }}</h3>
                            <p>Dikembalikan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $belumDikembalikan }}</h3>
                            <p>Belum Dikembalikan</p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ROW CHART --}}
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="revenue-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</main>


{{-- SCRIPT CHART --}}
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
