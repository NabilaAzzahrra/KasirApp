<!DOCTYPE html>
<html lang="id-ID">

<head>
    <?php $this->load->view('templates/head'); ?>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/404.css'); ?>">
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>4<span></span>4</h1>
            </div>
            <h2>Halaman tidak ditemukan!</h2>
            <p>Sepertinya halaman tersebut sudah dipindahkan atau dihapus. Anda bisa kembali ke halaman dashboard untuk melihat halaman apa saja yang tersedia.</p>
            <a href="<?= base_url(); ?>">Pergi ke Dashboard</a>
        </div>
    </div>
</body>
<?php $this->load->view('templates/script'); ?>

</html>