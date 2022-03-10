<div class="card">
    <div class="card-header">
        <strong class="card-title mb-3">Grafik Keuntungan Mingguan</strong>
    </div>
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Keuntungan Minggu I <?= $bulan_sekarang; ?></h3>
                            <canvas id="BarChartMingguI"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Keuntungan Minggu II <?= $bulan_sekarang; ?></h3>
                            <canvas id="BarChartMingguII"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Keuntungan Minggu III <?= $bulan_sekarang; ?></h3>
                            <canvas id="BarChartMingguIII"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card m-b-30">
                        <div class="au-card-inner">
                            <h3 class="title-2 m-b-40">Keuntungan Minggu IV <?= $bulan_sekarang; ?></h3>
                            <canvas id="BarChartMingguIV"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(function() {
        // single bar chart
        var ctx = document.getElementById("BarChartMingguI");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Tanggal 1", "Tanggal 2", "Tanggal 3", "Tanggal 4", "Tanggal 5", "Tanggal 6", "Tanggal 7"],
                    datasets: [{
                            label: "Sydney",
                            data: [<?= $tanggal_satu_SD ?>, <?= $tanggal_dua_SD ?>, <?= $tanggal_tiga_SD ?>, <?= $tanggal_empat_SD ?>, <?= $tanggal_lima_SD ?>, <?= $tanggal_enam_SD ?>, <?= $tanggal_tujuh_SD ?>],
                            borderColor: "rgba( 156, 94, 0 , 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 156, 94, 0 , 0.5)"
                        },
                        {
                            label: "Singapore",
                            data: [<?= $tanggal_satu_SGP ?>, <?= $tanggal_dua_SGP ?>, <?= $tanggal_tiga_SGP ?>, <?= $tanggal_empat_SGP ?>, <?= $tanggal_lima_SGP ?>, <?= $tanggal_enam_SGP ?>, <?= $tanggal_tujuh_SGP ?>],
                            borderColor: "rgba(0, 123, 255,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Hongkong",
                            data: [<?= $tanggal_satu_HK ?>, <?= $tanggal_dua_HK ?>, <?= $tanggal_tiga_HK ?>, <?= $tanggal_empat_HK ?>, <?= $tanggal_lima_HK ?>, <?= $tanggal_enam_HK ?>, <?= $tanggal_tujuh_HK ?>],
                            borderColor: "rgba( 5, 3, 1 ,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 5, 3, 1 ,0.5)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }
        var ctx = document.getElementById("BarChartMingguII");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Tanggal 8", "Tanggal 9", "Tanggal 10", "Tanggal 11", "Tanggal 12", "Tanggal 13", "Tanggal 14"],
                    datasets: [{
                            label: "Sydney",
                            data: [<?= $tanggal_delapan_SD ?>, <?= $tanggal_sembilan_SD ?>, <?= $tanggal_sepuluh_SD ?>, <?= $tanggal_sebelas_SD ?>, <?= $tanggal_dua_belas_SD ?>, <?= $tanggal_tiga_belas_SD ?>, <?= $tanggal_empat_belas_SD ?>],
                            borderColor: "rgba( 156, 94, 0 , 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 156, 94, 0 , 0.5)"
                        },
                        {
                            label: "Singapore",
                            data: [<?= $tanggal_delapan_SGP ?>, <?= $tanggal_sembilan_SGP ?>, <?= $tanggal_sepuluh_SGP ?>, <?= $tanggal_sebelas_SGP ?>, <?= $tanggal_dua_belas_SGP ?>, <?= $tanggal_tiga_belas_SGP ?>, <?= $tanggal_empat_belas_SGP ?>],
                            borderColor: "rgba(0, 123, 255,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Hongkong",
                            data: [<?= $tanggal_delapan_HK ?>, <?= $tanggal_sembilan_HK ?>, <?= $tanggal_sepuluh_HK ?>, <?= $tanggal_sebelas_HK ?>, <?= $tanggal_dua_belas_HK ?>, <?= $tanggal_tiga_belas_HK ?>, <?= $tanggal_empat_belas_HK ?>],
                            borderColor: "rgba( 5, 3, 1 ,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 5, 3, 1 ,0.5)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }
        var ctx = document.getElementById("BarChartMingguIII");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Tanggal 15", "Tanggal 16", "Tanggal 17", "Tanggal 18", "Tanggal 19", "Tanggal 20", "Tanggal 21"],
                    datasets: [{
                            label: "Sydney",
                            data: [<?= $tanggal_lima_belas_SD ?>, <?= $tanggal_enam_belas_SD ?>, <?= $tanggal_tujuh_belas_SD ?>, <?= $tanggal_delapan_belas_SD ?>, <?= $tanggal_sembilan_belas_SD ?>, <?= $tanggal_dua_puluh_SD ?>, <?= $tanggal_dua_puluh_satu_SD ?>],
                            borderColor: "rgba( 156, 94, 0 , 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 156, 94, 0 , 0.5)"
                        },
                        {
                            label: "Singapore",
                            data: [<?= $tanggal_lima_belas_SGP ?>, <?= $tanggal_enam_belas_SGP ?>, <?= $tanggal_tujuh_belas_SGP ?>, <?= $tanggal_delapan_belas_SGP ?>, <?= $tanggal_sembilan_belas_SGP ?>, <?= $tanggal_dua_puluh_SGP ?>, <?= $tanggal_dua_puluh_satu_SGP ?>],
                            borderColor: "rgba(0, 123, 255,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Hongkong",
                            data: [<?= $tanggal_lima_belas_HK ?>, <?= $tanggal_enam_belas_HK ?>, <?= $tanggal_tujuh_belas_HK ?>, <?= $tanggal_delapan_belas_HK ?>, <?= $tanggal_sembilan_belas_HK ?>, <?= $tanggal_dua_puluh_HK ?>, <?= $tanggal_dua_puluh_satu_HK ?>],
                            borderColor: "rgba( 5, 3, 1 ,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 5, 3, 1 ,0.5)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }
        var ctx = document.getElementById("BarChartMingguIV");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Tanggal 22", "Tanggal 23", "Tanggal 24", "Tanggal 25", "Tanggal 26", "Tanggal 27", "Tanggal 28", "Tanggal 29", "Tanggal 30", "Tanggal 31"],
                    datasets: [{
                            label: "Sydney",
                            data: [<?= $tanggal_dua_puluh_dua_SD ?>, <?= $tanggal_dua_puluh_tiga_SD ?>, <?= $tanggal_dua_puluh_empat_SD ?>, <?= $tanggal_dua_puluh_lima_SD ?>, <?= $tanggal_dua_puluh_enam_SD ?>, <?= $tanggal_dua_puluh_tujuh_SD ?>, <?= $tanggal_dua_puluh_delapan_SD ?>, <?= $tanggal_dua_puluh_sembilan_SD ?>, <?= $tanggal_tiga_puluh_SD ?>, <?= $tanggal_tiga_puluh_satu_SD ?>],
                            borderColor: "rgba( 156, 94, 0 , 0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 156, 94, 0 , 0.5)"
                        },
                        {
                            label: "Singapore",
                            data: [<?= $tanggal_dua_puluh_dua_SGP ?>, <?= $tanggal_dua_puluh_tiga_SGP ?>, <?= $tanggal_dua_puluh_empat_SGP ?>, <?= $tanggal_dua_puluh_lima_SGP ?>, <?= $tanggal_dua_puluh_enam_SGP ?>, <?= $tanggal_dua_puluh_tujuh_SGP ?>, <?= $tanggal_dua_puluh_delapan_SGP ?>, <?= $tanggal_dua_puluh_sembilan_SGP ?>, <?= $tanggal_tiga_puluh_SGP ?>, <?= $tanggal_tiga_puluh_satu_SGP ?>],
                            borderColor: "rgba(0, 123, 255,0.09)",
                            borderWidth: "0",
                            backgroundColor: "rgba(0, 123, 255, 0.5)",
                            fontFamily: "Poppins"
                        },
                        {
                            label: "Hongkong",
                            data: [<?= $tanggal_dua_puluh_dua_HK ?>, <?= $tanggal_dua_puluh_tiga_HK ?>, <?= $tanggal_dua_puluh_empat_HK ?>, <?= $tanggal_dua_puluh_lima_HK ?>, <?= $tanggal_dua_puluh_enam_HK ?>, <?= $tanggal_dua_puluh_tujuh_HK ?>, <?= $tanggal_dua_puluh_delapan_HK ?>, <?= $tanggal_dua_puluh_sembilan_HK ?>, <?= $tanggal_tiga_puluh_HK ?>, <?= $tanggal_tiga_puluh_satu_HK ?>],
                            borderColor: "rgba( 5, 3, 1 ,0.9)",
                            borderWidth: "0",
                            backgroundColor: "rgba( 5, 3, 1 ,0.5)",
                            fontFamily: "Poppins"
                        }
                    ]
                },
                options: {
                    legend: {
                        position: 'top',
                        labels: {
                            fontFamily: 'Poppins'
                        }

                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontFamily: "Poppins"

                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontFamily: "Poppins"
                            }
                        }]
                    }
                }
            });
        }

    })
</script>