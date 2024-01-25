<!DOCTYPE html>
<html lang="id-ID">

<head>
	<?php $this->load->view('templates/head'); ?>
</head>

<body class="m-md-5">
	<table class="border-0">
		<tbody>
			<?php
			foreach ($ht_penjualan as $h) { ?>
				<tr>
					<td>Kasir</td>
					<td class="text-center" width="15%">:</td>
					<td><?= $h->kasir ?></td>
				</tr>
				<tr>
					<td>Customer</td>
					<td class="text-center" width="15%">:</td>
					<td><?= $h->nama_customer ?></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td class="text-center" width="15%">:</td>
					<td><?= date('d/m/Y', strtotime($h->waktu)); ?></td>
				</tr>
				<tr>
					<td>Waktu</td>
					<td class="text-center" width="15%">:</td>
					<td><?= date('H:i', strtotime($h->waktu)); ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<table id="tabelku" class="table table-bordered">
		<thead>
			<tr>
				<th class="text-center">No.</th>
				<th class="text-center">Nama Produk</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Qty</th>
				<th class="text-center">Total Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$total = 0;
			foreach ($dt_penjualan as $d) {
				$total += $d->harga_jual * $d->qty;
			?>
				<tr>
					<td class="text-center"><?= $no++; ?>.</td>
					<td><?= $d->nama_produk ?></td>
					<td>
						Rp<span class="float-right"><?= number_format($d->harga_jual, 0, ".", "."); ?></span>
					</td>
					<td class="text-center"><?= $d->qty ?></td>
					<td>
						Rp<span class="float-right"><?= number_format($d->harga_jual * $d->qty, 0, ".", "."); ?></span>
					</td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td class="text-center text-bold" colspan="4">TOTAL</td>
				<td class="text-right text-bold"><span class="float-left">Rp</span><?= number_format($total, 0, ".", "."); ?></td>
			</tr>
		</tfoot>
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
