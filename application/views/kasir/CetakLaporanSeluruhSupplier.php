<!DOCTYPE html>
<html lang="id-ID">

<head>
    <?php $this->load->view('templates/head'); ?>
</head>

<body class="m-md-5">
    <table class="text-center mt-10 mb-2">
        <td>
            <pre><img src="https://plb.ac.id/new/wp-content/uploads/2022/01/logo-Politeknik-LP3I.png" width="110px" height="110px"></pre>
        </td>
        <td class="text-center">
            <h1>RE Politeknik LP3I Kampus Tasikmalaya</h1>
            <h4>Jalan Ir. H. Juanda KM. 2 No. 106, Panglayungan, Kec. Cipedes, Tasikmalaya, Jawa Barat 46151 Telepon: (0265) 311766</h4>
        </td>
    </table>
    <hr noshade size=4 width="98%">
    <div class="text-center">
        <h3 class="text-bold">Laporan Pembelian Seluruh Supplier</h3>
        <?= date('d/m/Y', strtotime($dari)); ?> s/d <?= date('d/m/Y', strtotime($sampai)); ?><br>
    </div>
    <div class="m-3">
        <table id="tabelku" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Nama Supplier</th>
                    <th class="text-center">Pembelian</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Harga Jual</th>
                    <th class="text-center">Harga Beli</th>
                    <th class="text-center">Total Harga Beli</th>
                    <th class="text-center">(%) margin</th>
                    <th class="text-center">Margin</th>
                    <th class="text-center">Total Margin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $total_penjualan = 0;
                $total_qty = 0;
                $harga_jual = 0;
                $harga_beli = 0;
                $total_harga_beli = 0;
                $persen_margin = 0;
                $margin = 0;
                $total_margin = 0;
                foreach ($pembelian as $d) {
                    $total_penjualan += $d->harga_jual * $d->qty;
                    $total_qty += $d->qty;
                    $harga_jual += $d->harga_jual;
                    $harga_beli += $d->harga_beli;
                    $total_harga_beli += $d->harga_beli * $d->qty;
                    $persen_margin += $d->harga_beli / ($d->harga_jual - $d->harga_beli);
                    $margin += $d->harga_jual - $d->harga_beli;
                    $total_margin += ($d->harga_jual - $d->harga_beli) * $d->qty; ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?>.</td>
                        <td><?= $d->nama_produk ?></td>
                        <td><?= $d->nama_supplier ?></td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format($d->harga_jual * $d->qty, 0, ".", "."); ?>
                        </td>
                        <td class="text-center"><?= $d->qty ?></td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format($d->harga_jual, 0, ".", "."); ?>
                        </td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format($d->harga_beli, 0, ".", "."); ?>
                        </td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format($d->harga_beli * $d->qty, 0, ".", "."); ?>
                        </td>
                        <td class="text-center">
                            <?= number_format($d->harga_beli / ($d->harga_jual - $d->harga_beli), 2, ".", "."); ?> %
                        </td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format($d->harga_jual - $d->harga_beli, 0, ".", "."); ?>
                        </td>
                        <td class="text-right">
                            <span class="float-left">Rp</span>
                            <?= number_format(($d->harga_jual - $d->harga_beli) * $d->qty, 0, ".", "."); ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="text-bold">
                    <td class="text-center" colspan="3">TOTAL</td>
                    <td class="text-right">
                        <span class="float-left">Rp</span><?= number_format($total_penjualan, 0, '.', '.'); ?>
                    </td>
                    <td class="text-center"><?= $total_qty ?></td>
                    <td class="text-right">
                        <span class="float-left">Rp</span>
                        <?= number_format($harga_jual, 0, ".", "."); ?>
                    </td>
                    <td class="text-right">
                        <span class="float-left">Rp</span>
                        <?= number_format($harga_beli, 0, ".", "."); ?>
                    </td>
                    <td class="text-right">
                        <span class="float-left">Rp</span>
                        <?= number_format($total_harga_beli, 0, ".", "."); ?>
                    </td>
                    <td class="text-center"><?= number_format($persen_margin, 2, ".", "."); ?> %</td>
                    <td class="text-right">
                        <span class="float-left">Rp</span>
                        <?= number_format($margin, 0, ".", "."); ?>
                    </td>
                    <td class="text-right">
                        <span class="float-left">Rp</span>
                        <?= number_format($total_margin, 0, ".", "."); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <table class="float-right" width="30%"><br>
        <tr class="text-center">
            <td>Tasikmalaya, <?= date('d/m/Y'); ?></td>
        </tr>
        <tr class="text-center">
            <td>Mengetahui</td>
        </tr>
        <tr class="text-center">
            <td><b>Kepala Kampus</b></td>
        </tr>
        <tr>
            <td><br><br><br><br></td>
        </tr>
        <tr class="text-center">
            <td><b>H. Rudi Kurniawan, S.T., M.M</b></td>
        </tr>
        <tr class="text-center">
            <td>NIP. XXXXXXXX XXXXXX X XXX</td>
        </tr>
    </table>
</body>
<?php $this->load->view("templates/script"); ?>
<script>
    $(function() {
        $("#tabelku").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "language": {
                "url": "<?= base_url('assets/plugins/datatables/i18n/id.json'); ?>"
            }
        });
    });
</script>

</html>
