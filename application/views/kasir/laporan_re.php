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
                            <h1 class="m-0">Laporan RE</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Kasir'); ?>">Beranda</a></li>
                                <li class="breadcrumb-item active">Laporan</li>
                                <li class="breadcrumb-item active">RE</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Cetak Laporan</h3>
                                </div>
                                <form action="<?= base_url('Kasir/cetak_laporan_re'); ?>" target="_blank">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Dari</label>
                                            <input name="dari" type="date" class="form-control" value="<?= $dari ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Sampai</label>
                                            <input name="sampai" type="date" class="form-control" value="<?= $sampai ?>">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-block bg-gradient-primary"><i class="fal fa-print"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php $this->load->view("templates/footer"); ?>
    </div>
</body>
<?php $this->load->view('templates/script'); ?>

</html>
