<!DOCTYPE html>
<html lang="id-ID">

<head>
    <?php $this->load->view('templates/head'); ?>
</head>

<body class="hold-transition sidebar-mini-md layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        $this->load->view('templates/preloader');
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Transaksi</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>User</h3>
                                    <p><?= count($user); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-user"></i>
                                </div>
                                <a href="<?= base_url('Admin/user'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Kategori</h3>
                                    <p><?= count($kategori); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-list-ul"></i>
                                </div>
                                <a href="<?= base_url('Admin/kategori'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Owner</h3>
                                    <p><?= count($owner); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-book-user"></i>
                                </div>
                                <a href="<?= base_url('Admin/owner'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Customer</h3>
                                    <p><?= count($customer); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-users"></i>
                                </div>
                                <a href="<?= base_url('Admin/customer'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Supplier</h3>
                                    <p><?= count($supplier); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-shop"></i>
                                </div>
                                <a href="<?= base_url('Admin/supplier'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Produk</h3>
                                    <p><?= count($produk); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-boxes-stacked"></i>
                                </div>
                                <a href="<?= base_url('Admin/produk'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Penjualan</h3>
                                    <p><?= count($penjualan); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-bag-shopping"></i>
                                </div>
                                <a href="<?= base_url('Admin/penjualan'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-gradient-info">
                                <div class="inner">
                                    <h3>Pembelian</h3>
                                    <p><?= count($pembelian); ?> Data</p>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-cart-shopping"></i>
                                </div>
                                <a href="<?= base_url('Admin/pembelian'); ?>" class="small-box-footer">Pergi ke halaman <i class="fal fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view('templates/footer'); ?>
    </div>
</body>
<?php $this->load->view('templates/script'); ?>
<script>
    $(function() {
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = {
            labels: ['Penjualan', 'Pembelian', 'Laba'],
            datasets: [{
                label: 'Transaksi',
                backgroundColor: '#27a8bd',
                borderColor: '#007bff',
                pointRadius: false,
                pointColor: '#27a8bd',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [<?= ($total_hj); ?>, <?= ($total_hb); ?>, <?= ($total_hj - $total_hb); ?>]
            }]
        }

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        precision: 0,
                    }
                }]
            }
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    });
</script>

</html>