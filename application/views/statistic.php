<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">FAQ</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Statistik
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                <!-- Doughnut Chart -->
                <div class="col-md-4">
                    <h4 class="text-center">Persentase Rumah Ibadah Berdasarkan Agama</h4>
                    <canvas id="chartDoughnut"></canvas>
                </div>

                <!-- Bar Chart-->
                <div class="col-md-4">
                    <h4 class="text-center">Jumlah Rumah Ibadah per Kecamatan</h4>
                    <canvas id="barChart"></canvas>
                </div>

                <!-- Scatter Chart -->
                <div class="col-md-4">
                    <h4 class="text-center">Jumlah Rumah Ibadah per Tahun di Berbagai Kecamatan</h4>
                    <canvas id="scatter_chart"></canvas>
                </div>

                <!-- Line Chart -->
                <div class="col-md-12">
                    <h4 class="text-center">Tren Pembangunan Rumah Ibadah per Jenis</h4>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Optional for interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Doughnut Chart - Persentase Rumah Ibadah Berdasarkan Agama
    var dataset_doughnutchart = <?= $dataset_doughnutchart ?>;
    var ctxDoughnut = document.getElementById('chartDoughnut').getContext('2d');
    var chartDoughnut = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: dataset_doughnutchart,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Bar Chart - Jumlah Rumah Ibadah per Kecamatan 
    var datasets_barchart = <?= $dataset_barchart ?>;
    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: datasets_barchart,
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Kecamatan'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Rumah Ibadah'
                    },
                    beginAtZero: true
                }
            }
        }
    });

    // Scatter Chart - Jumlah Rumah Ibadah per Tahun di Berbagai Kecamatan
    var datasets_scatterchart = <?= $dataset_scatterchart ?>;
    var ctxScatter = document.getElementById('scatter_chart').getContext('2d');
    var chartScatter = new Chart(ctxScatter, {
        type: 'scatter',
        data: {
            datasets: datasets_scatterchart
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom',
                    title: {
                        display: true,
                        text: 'Tahun'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Jumlah Rumah Ibadah'
                    },
                    beginAtZero: true
                }
            }
        }
    });

    // Line Chart - Tren Pembangunan Rumah Ibadah per Jenis
    var datasets_linechart = <?= $dataset_linechart ?>;
    var ctx = document.getElementById('lineChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: datasets_linechart,
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    title: { display: false, text: 'Tren Pembangunan Rumah Ibadah per Jenis' }
                },
                scales: {
                    x: { title: { display: true, text: 'Tahun' } },
                    y: { title: { display: true, text: 'Jumlah Rumah Ibadah' }, beginAtZero: true }
                }
            }
        });
</script>