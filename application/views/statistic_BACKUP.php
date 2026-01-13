<style>
    /* Menyesuaikan ukuran canvas agar chart memiliki ukuran yang konsisten */
    _canvas {
        width: 100% !important;  /* Canvas akan menyesuaikan lebar kolom */
        height: 300px !important;  /* Tinggi yang konsisten untuk semua chart */
    }
</style>

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
                        
                    <!-- Chart 1 -->
                    <div class="col-md-4">
                        <h4 class="text-center">Persentase Rumah Ibadah Berdasarkan Agama</h4>
                        <canvas id="chartDoughnut"></canvas>
                    </div>

                    <!-- Chart 2 -->
                    <div class="col-md-4">
                        <h4 class="text-center">Jumlah Rumah Ibadah per Kecamatan</h4>
                        <canvas id="barChart"></canvas>
                    </div>

                    <!-- Chart 3 -->
                    <div class="col-md-4">
                        <h4 class="text-center">Jumlah Rumah Ibadah per Tahun di Berbagai Kecamatan</h4>
                        <canvas id="scatter_chart"></canvas>
                    </div>
                    <!-- </div> -->

                    <div class="col-md-12">
                        <h4 class="text-center">Tren Pembangunan Rumah Ibadah per Jenis</h4>
                        <canvas id="chartLine"></canvas>
                    </div>

                <!-- </div> -->

<!-- Bootstrap JS (Optional for interactivity) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>

    // Chart 2 - Jumlah Rumah Ibadah per Provinsi
    // var ctx2 = document.getElementById('chart2').getContext('2d');
    // var chart2 = new Chart(ctx2, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Jawa Barat', 'Jawa Timur', 'Sumatra Utara', 'Bali', 'Sulawesi Selatan'],
    //         datasets: [{
    //             label: 'Jumlah Rumah Ibadah',
    //             data: [1200, 1100, 900, 400, 600], // Contoh jumlah rumah ibadah
    //             backgroundColor: '#1abc9c',
    //             borderColor: '#16a085',
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 display: false,
    //             }
    //         },
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // Chart 3 - Tren Pembangunan Rumah Ibadah
    // var ctx3 = document.getElementById('chart3').getContext('2d');
    // var chart3 = new Chart(ctx3, {
    //     type: 'line',
    //     data: {
    //         labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021'],
    //         datasets: [{
    //             label: 'Tren Pembangunan Rumah Ibadah',
    //             data: [150, 200, 180, 220, 250, 230, 300], // Contoh data pembangunan
    //             borderColor: '#9b59b6',
    //             fill: false,
    //             tension: 0.1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 position: 'top',
    //             }
    //         },
    //         scales: {
    //             x: {
    //                 title: {
    //                     display: true,
    //                     text: 'Tahun'
    //                 }
    //             },
    //             y: {
    //                 title: {
    //                     display: true,
    //                     text: 'Jumlah Rumah Ibadah'
    //                 },
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // Chart 4 - Jumlah Rumah Ibadah per Kecamatan
    // var ctx4 = document.getElementById('chart4').getContext('2d');
    // var chart4 = new Chart(ctx4, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Kecamatan A', 'Kecamatan B', 'Kecamatan C', 'Kecamatan D', 'Kecamatan E'],
    //         datasets: [{
    //             label: 'Jumlah Rumah Ibadah per Kecamatan',
    //             data: [150, 120, 180, 200, 140], // Contoh jumlah rumah ibadah per kecamatan
    //             backgroundColor: '#3498db',
    //             borderColor: '#2980b9',
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 display: false,
    //             }
    //         },
    //         scales: {
    //             y: {
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });

    // Doughnut Chart - Persentase Rumah Ibadah Berdasarkan Agama
    var ctxDoughnut = document.getElementById('chartDoughnut').getContext('2d');
    var chartDoughnut = new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: <?= '['.implode(',',$data_religion).']' ?>, //['Masjid', 'Gereja', 'Vihara', 'Pura'],
            datasets: [{
                label: 'Persentase Rumah Ibadah Berdasarkan Agama',
                data: <?= '['.implode(',',array_column($doughnut_chart, 'jumlah_rumahibadah')).']' ?>, //[40, 30, 20, 10], // Contoh data persentase
                backgroundColor: ['#f39c12', '#e74c3c', '#2ecc71', '#3498db'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });


    // Line Chart - Tren Pembangunan Rumah Ibadah per Jenis
    var datasets_linechart = <?php echo $datasets_linechart; ?>;
//     var datasets_linechart = [
//     {
//         label: 'Masjid',
//         data: [
//             {x: 2020, y: 15},
//             {x: 2021, y: 20},
//             {x: 2022, y: 25}
//         ],
//         borderColor: '#3498db',
//         borderWidth: 2,
//         fill: false,
//         pointRadius: 5
//     },
//     {
//         label: 'Gereja',
//         data: [
//             {x: 2020, y: 8},
//             {x: 2021, y: 10},
//             {x: 2022, y: 12}
//         ],
//         borderColor: '#f1c40f',
//         borderWidth: 2,
//         fill: false,
//         pointRadius: 5
//     }
// ];


    // console.log(datasets_linechart);

    // var ctxLine = document.getElementById('chartLine').getContext('2d');
    // var chartLine = new Chart(ctxLine, {
    //     type: 'line',
    //     data: {
    //         labels: ['2015', '2016', '2017', '2018', '2019', '2020', '2021'],  // Tahun
    //         datasets: datasets_linechart,
    //         datasets: [{
    //             label: 'Masjid',
    //             data: [150, 200, 180, 220, 250, 230, 300],  // Data untuk masjid
    //             borderColor: '#f39c12',  // Warna garis untuk masjid
    //             fill: false,
    //             tension: 0.1
    //         }, {
    //             label: 'Gereja',
    //             data: [120, 130, 140, 160, 170, 180, 200],  // Data untuk gereja
    //             borderColor: '#e74c3c',  // Warna garis untuk gereja
    //             fill: false,
    //             tension: 0.1
    //         }, {
    //             label: 'Vihara',
    //             data: [50, 70, 60, 80, 90, 100, 110],  // Data untuk vihara
    //             borderColor: '#2ecc71',  // Warna garis untuk vihara
    //             fill: false,
    //             tension: 0.1
    //         }, {
    //             label: 'Pura',
    //             data: [80, 100, 120, 140, 150, 160, 170],  // Data untuk pura
    //             borderColor: '#3498db',  // Warna garis untuk pura
    //             fill: false,
    //             tension: 0.1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 position: 'top',  // Menempatkan legend di atas chart
    //                 labels: {
    //                     boxWidth: 12,
    //                     padding: 15
    //                 }
    //             },
    //             tooltip: {
    //                 mode: 'nearest',
    //                 intersect: false,
    //                 callbacks: {
    //                     label: function(tooltipItem) {
    //                         return tooltipItem.datasets_linechart.label + ': ' + tooltipItem.raw.y + ' Rumah Ibadah';
    //                     }
    //                 }
    //             }
    //         },
    //         scales: {
    //             x: {
    //                 type: 'linear',  // Menampilkan tahun sebagai skala linear
    //                 title: {
    //                     display: true,
    //                     text: 'Tahun'
    //                 }
    //             },
    //             y: {
    //                 title: {
    //                     display: true,
    //                     text: 'Jumlah Rumah Ibadah'
    //                 },
    //                 beginAtZero: true,  // Memulai sumbu Y dari 0
    //                 ticks: {
    //                     stepSize: 5  // Menambahkan interval pada sumbu Y
    //                 }
    //             }
    //         },
    //     }
    // });

        // Data yang sudah diproses di controller
        var datasets = <?php echo $datasets; ?>;

        var ctxLine = document.getElementById('chartLine').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                datasets: datasets_linechart  // Langsung menggunakan data dari controller
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'linear',  // Menampilkan tahun sebagai skala linear
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
                        beginAtZero: true,  // Memulai sumbu Y dari 0
                    }
                }
            }
        });

    // Scatter Chart - Tren Pembangunan Rumah Ibadah per Kecamatan dan Tahun
    // var datasets_scatterchart = <?= $datasets_scatterchart ?>;

    var datasets_scatterchart = [
    {
        label: 'Masjid',
        data: [
            {x: 2020, y: 15},
            {x: 2021, y: 18},
            {x: 2022, y: 22}
        ],
        borderColor: '#3498db',
        backgroundColor: 'rgba(52, 152, 219, 0.2)',
        pointRadius: 5
    },
    {
        label: 'Gereja',
        data: [
            {x: 2020, y: 8},
            {x: 2021, y: 12},
            {x: 2022, y: 15}
        ],
        borderColor: '#f1c40f',
        backgroundColor: 'rgba(241, 196, 15, 0.2)',
        pointRadius: 5
    },
    {
        label: 'Pura',
        data: [
            {x: 2020, y: 5},
            {x: 2021, y: 7},
            {x: 2022, y: 9}
        ],
        borderColor: '#e74c3c',
        backgroundColor: 'rgba(231, 76, 60, 0.2)',
        pointRadius: 5
    }
];
    // console.log(datasets_scatterchart);
    var ctxScatter = document.getElementById('scatter_chart').getContext('2d');
    var chartScatter = new Chart(ctxScatter, {
        type: 'scatter',
        data: {
            // datasets: datasets_scatterchart
            
            datasets: [{
                label: 'Barangin',
                data: [{x: 2015, y: 150}, {x: 2016, y: 180}, {x: 2017, y: 210}, {x: 2018, y: 250}, {x: 2019, y: 280}, {x: 2020, y: 300}, {x: 2021, y: 350}],  // Data untuk Kecamatan A
                backgroundColor: '#f39c12',  // Warna titik untuk Kecamatan A
                borderColor: '#f39c12',
                borderWidth: 1
            }, {
                label: 'Lembah Segar',
                data: [{x: 2015, y: 120}, {x: 2016, y: 140}, {x: 2017, y: 160}, {x: 2018, y: 180}, {x: 2019, y: 200}, {x: 2020, y: 230}, {x: 2021, y: 260}],  // Data untuk Kecamatan B
                backgroundColor: '#e74c3c',  // Warna titik untuk Kecamatan B
                borderColor: '#e74c3c',
                borderWidth: 1
            }, {
                label: 'Silungkang',
                data: [{x: 2015, y: 80}, {x: 2016, y: 90}, {x: 2017, y: 100}, {x: 2018, y: 120}, {x: 2019, y: 140}, {x: 2020, y: 150}, {x: 2021, y: 170}],  // Data untuk Kecamatan C
                backgroundColor: '#2ecc71',  // Warna titik untuk Kecamatan C
                borderColor: '#2ecc71',
                borderWidth: 1
            }, {
                label: 'Talawi',
                data: [{x: 2013, y: 20}, {x: 2014, y: 30}, {x: 2015, y: 50}, {x: 2018, y: 120}, {x: 2019, y: 140}, {x: 2020, y: 150}, {x: 2021, y: 170}],  // Data untuk Kecamatan C
                backgroundColor: '#088a71',  // Warna titik untuk Kecamatan C
                borderColor: '#088a71',
                borderWidth: 1
            }]
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


    // BarChart
    // var ctxBar = document.getElementById('barChart').getContext('2d');
    // var barChart = new Chart(ctxBar, {
    //     type: 'bar',
    //     data: {
    //         labels: Kecamatan, //labels,  // Kecamatan
    //         datasets: [
    //             {
    //                 label: 'Masjid',
    //                 data: [3, 4, 2], //datasets['Masjid'], //[3, 4, 2],  // Jumlah masjid per kecamatan
    //                 backgroundColor: '#f39c12',
    //                 borderColor: '#f39c12',
    //                 borderWidth: 1
    //             },
    //             {
    //                 label: 'Musholla',
    //                 data: [2, 3, 1], //datasets['Musholla'],// [2, 3, 1],  // Jumlah gereja per kecamatan
    //                 backgroundColor: '#e74c3c',
    //                 borderColor: '#e74c3c',
    //                 borderWidth: 1
    //             },
    //             {
    //                 label: 'Gereja',
    //                 data: datasets['Gereja'],//[1, 2, 1],  // Jumlah vihara per kecamatan
    //                 backgroundColor: '#2ecc71',
    //                 borderColor: '#2ecc71',
    //                 borderWidth: 1
    //             },
    //             {
    //                 label: 'Pura',
    //                 data: [1, 0, 2], //datasets['Pura'], // [1, 0, 2],  // Jumlah pura per kecamatan
    //                 backgroundColor: '#3498db',
    //                 borderColor: '#3498db',
    //                 borderWidth: 1
    //             },
    //             {
    //                 label: 'Vihara',
    //                 data: [1, 0, 2], // datasets['Vihara'], // [1, 0, 2],  // Jumlah vihara per kecamatan
    //                 backgroundColor: '#3498cd',
    //                 borderColor: '#3498cd',
    //                 borderWidth: 1
    //             }
    //         ]
    //     },
    //     options: {
    //         responsive: true,
    //         scales: {
    //             x: {
    //                 title: {
    //                     display: true,
    //                     text: 'Kecamatan'
    //                 }
    //             },
    //             y: {
    //                 title: {
    //                     display: true,
    //                     text: 'Jumlah Rumah Ibadah'
    //                 },
    //                 beginAtZero: true
    //             }
    //         }
    //     }
    // });
    var datasets = <?= $datasets ?>;

    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: <?= $labels ?>,  // ['Kecamatan A', 'Kecamatan B', 'Kecamatan C'],  // Kecamatan
            datasets: [
                {
                    label: 'Masjid',
                    data: datasets['Masjid'], // [3, 4, 2],  // Jumlah masjid per kecamatan
                    backgroundColor: '#2ecc71',
                    borderColor: '#2ecc71',
                    borderWidth: 1
                },
                {
                    label: 'Gereja',
                    data: datasets['Gereja'], // [2, 3, 1],  // Jumlah gereja per kecamatan
                    backgroundColor: '#e74c3c',
                    borderColor: '#e74c3c',
                    borderWidth: 1
                },
                // {
                //     label: 'Vihara',
                //     data: datasets['Vihara'], // [1, 2, 1],  // Jumlah vihara per kecamatan
                //     backgroundColor: '#f1c40f',
                //     borderColor: '#f1c40f',
                //     borderWidth: 1
                // },
                {
                    label: 'Pura',
                    data: datasets['Pura'], // [1, 0, 2],  // Jumlah pura per kecamatan
                    backgroundColor: '#f39c12',
                    borderColor: '#f39c12',
                    borderWidth: 1
                },
                {
                    label: 'Musholla',
                    data: datasets['Musholla'],// [1, 0, 2],  // Jumlah pura per kecamatan
                    backgroundColor: '#3498db',
                    borderColor: '#3498db',
                    borderWidth: 1
                }
            ]
        },
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

    // scatter chart 2
    // Data yang sudah diproses di controller
    // var datasets_scatterchart = <?= $datasets_scatterchart ?>;
    // console.log(datasets_scatterchart);

    // var ctxScatter = document.getElementById('scatter_chart').getContext('2d');
    // var scatterChart = new Chart(ctxScatter, {
    //     type: 'scatter',
    //     data: {
    //         datasets: datasets_scatterchart  // Langsung menggunakan data dari controller
    //     },
    //     options: {
    //         responsive: true,
    //         scales: {
    //             x: {
    //                 type: 'linear',  // Menampilkan tahun sebagai skala linear
    //                 title: {
    //                     display: true,
    //                     text: 'Tahun'
    //                 }
    //             },
    //             y: {
    //                 title: {
    //                     display: true,
    //                     text: 'Jumlah Rumah Ibadah'
    //                 },
    //                 beginAtZero: true,  // Memulai sumbu Y dari 0
    //             }
    //         }
    //     }
    // });
</script>
<!-- end new canvas -->

            </div>
        </div>
    </div>
</div>




<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
