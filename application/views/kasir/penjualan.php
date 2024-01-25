<!DOCTYPE html>
<html lang="id-ID">

<head>
	<?php $this->load->view('templates/head'); ?>
</head>

<body class="hold-transition sidebar-mini-md layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<?php $this->load->view("templates/preloader"); ?>
		<?php $this->load->view("templates/navbar"); ?>
		<?php $this->load->view("templates/sidebar"); ?>
		<div class="content-wrapper" id="konten">
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Penjualan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('Kasir'); ?>">Beranda</a></li>
								<li class="breadcrumb-item active">Transaksi</li>
								<li class="breadcrumb-item active">Penjualan</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body p-0">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="text-center">Total Bayar</th>
												<th class="text-center">Total Piutang</th>
												<th class="text-center">Total Omset</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-right"><span class="float-left">Rp</span><?= number_format($total_bayar, 0, ".", "."); ?></td>
												<td class="text-right"><span class="float-left">Rp</span><?= number_format($total_piutang, 0, ".", "."); ?></td>
												<td class="text-right"><span class="float-left">Rp</span><?= number_format($total_omset, 0, ".", "."); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="card card-outline card-primary">
								<div class="card-header">
									<h3 class="card-title">Daftar Penjualan</h3>
									<div class="btn-group float-right">
										<button id="filterkan" class="btn bg-gradient-primary" onclick="return filterkan()">
											<i class="fal fa-filter"></i>
										</button>
										<button id="tambahkan" class="btn bg-gradient-primary" onclick="return tambah()">
											<i class="fal fa-plus-circle"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<table id="tabelku" class="table table-bordered">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th class="text-center">Customer</th>
												<th class="text-center">Tanggal</th>
												<th class="text-center">Waktu</th>
												<th class="text-center">Total Bayar</th>
												<th class="text-center">Piutang</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($read as $d) {
											?>
												<tr>
													<td class="text-center"><?= $no++; ?>.</td>
													<td><?= $d->nama_customer ?></td>
													<td class="text-center"><?= date('d/m/Y', strtotime($d->waktu)); ?></td>
													<td class="text-center"><?= date('H:i', strtotime($d->waktu)); ?></td>
													<td>
														Rp
														<span class="float-right">
															<?= number_format($d->total_bayar, 0, ".", "."); ?>
														</span>
													</td>
													<td>
														Rp
														<span class="float-right">
															<?= number_format($d->total_omset - $d->total_bayar, 0, ".", "."); ?>
														</span>
													</td>
													<td class="text-center">
														<div class="btn-group">
															<a class="btn bg-gradient-primary" href="<?= base_url('Kasir/CetakFakturPenjualan/' . $d->id); ?>" target="_blank"><i class="fal fa-print"></i></a>
														</div>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php $this->load->view("templates/footer"); ?>
	</div>
	<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="Modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h4 id="modal-header" class="modal-title"></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Customer</label>
								<select name="id_customer" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Customer" onchange="return cekCustomer()">
									<?php foreach ($customer as $c) { ?>
										<option value="<?= $c->id ?><?= $c->status ?>"><?= $c->nama_customer ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="card card-outline card-primary">
								<div class="card-header">
									<h3 class="card-title">Transaksi</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label>Produk</label>
										<select name="id_produk" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;" data-placeholder="Pilih Produk" onchange="return getProduk()">
											<?php foreach ($produk as $p) { ?>
												<option value="<?= $p->id ?>"><?= $p->nama_produk ?></option>
											<?php } ?>
										</select>
									</div>
									<span id="data-produk"></span>
									<div class="form-group">
										<label>Qty</label>
										<input type="number" name="qty" class="form-control" placeholder="Qty">
									</div>
								</div>
								<div class="card-footer">
									<button type="button" class="btn btn-block bg-gradient-primary" onclick="return simpanan()">Tambah ke Keranjang</button>
								</div>
							</div>
							<div id="total-bayar" class="form-group d-none">
								<label>Total Bayar</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text">
											Rp
										</div>
									</div>
									<input name="total_bayar" type="text" class="form-control">
								</div>
							</div>
							<div class="card card-outline card-primary">
								<div class="card-header">
									<h3 class="card-title">Keranjang</h3>
								</div>
								<div class="card-body p-0">
									<table class="table">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th class="text-center">Produk</th>
												<th class="text-center">Harga</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Total</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody id="keranjang"></tbody>
									</table>
								</div>
							</div>
						</span>
						<span id="modal-body-delete">
							Yakin untuk menghapus <b id="name-delete"></b> dari tabel ini?
						</span>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-block" id="modal-button">OK</button>
						<button type="button" class="btn btn-block" data-dismiss="modal" id="batal" aria-d-none="true">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<form id="form-filter" name="form-filter" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="filterin" class="modal fade">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h4 id="judul-filter" class="modal-title"></h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Dari</label>
							<input type="date" name="dari" class="form-control" value="<?= $dari; ?>">
						</div>
						<div class="form-group">
							<label>Sampai</label>
							<input type="date" name="sampai" class="form-control" value="<?= $sampai; ?>">
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button id="filter-modal-button" type="submit" class="btn btn-block">Oke</button>
						<button id="batalan" type="button" class="btn btn-block" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</form>
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
		$('#Modal').on('shown.bs.modal', function() {
			$('[name="id_customer"]').focus();
		});
		$('#filterin').on('shown.bs.modal', function() {
			$('[name="dari"]').focus();
		});
		$('.select2').select2({
			dropdownParent: $('#Modal')
		});
		$('[name="total_bayar"]').inputmask({
			alias: 'numeric',
			groupSeparator: '.',
			digits: 0,
			digitsOptional: true
		});
		$('[name="form"]').validate({
			rules: {
				id_customer: {
					required: true
				},
				total_bayar: {
					required: true
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
		<?php if ($this->session->flashdata('emptycart')) { ?>
			toastr.warning('Isi dulu produk dan qty yang diinginkan!');
		<?php } ?>
	});

	function cekCustomer() {
		$('[name="id_customer"]').change(function() {
			var id = $(this).val().replace(/^\d/g, '');
			if (id == 'Karyawan') {
				$('#total-bayar').removeClass('d-none');
			} else {
				$('#total-bayar').addClass('d-none');
			}
		});
	}

	function getProduk() {
		var id = $('[name="id_produk"]').val();
		$('#data-produk').load("getProduk?id=" + id, function() {
			$('#hb').addClass('d-none');
			$('[name="harga_jual"]').inputmask({
				alias: 'numeric',
				groupSeparator: '.',
				digits: 0,
				digitsOptional: true
			});
		});
	}

	function simpanan() {
		var id = $('[name="id_produk"]').val();
		var qty = $('[name="qty"]').val();
		if (id == null || qty > 999) {
			toastr.warning('Isi dulu produk dan qty yang diinginkan!');
		} else {
			$('#keranjang').load("AddCartPenjualan/" + id + "/" + qty);
			$('[name="id_produk"]').val(null).trigger('change').focus();
			$('[name="qty"]').val('');
		}
	}

	function tambah_lagi(row_id, qty) {
		$('#keranjang').load("AddCartLagiPenjualan/" + row_id + "/" + qty);
	}

	function kurangi_qty(row_id, qty) {
		$('#keranjang').load("DeleteCartQtyPenjualan/" + row_id + "/" + qty);
	}

	function batalan(row_id) {
		$('#keranjang').load("DeleteCartPenjualan/" + row_id);
	}

	function filterkan() {
		$('#filterin').modal('show');
		$('.modal-dialog').removeClass('modal-lg');
		$('#judul-filter').html('Filter Menurut Tanggal');
		$('#batalan').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
		$('#filter-modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
		$('#filter-modal-button').removeAttr('name');
		$('#filter-modal-button').attr('name', 'cari');
	}

	function tambah() {
		$('#Modal').modal('show');
		$('.modal-dialog').addClass('modal-lg');
		$('#modal-header').html('Tambah Penjualan');
		$('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
		$('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
		$('#modal-body-update-or-create').removeClass('d-none');
		$('#modal-body-delete').addClass('d-none');
		$('[name="id"]').val("");
		$('[name="id_customer"]').val(null).trigger('change');
		$('[name="id_produk"]').val(null).trigger('change');
		$('[name="qty"]').val("");
		$('#keranjang').load("ShowCartPenjualan");
		$("[name='form']").removeAttr('action');
		$("[name='form']").attr('action', '<?= base_url('Kasir/SaveTransaksiPenjualan'); ?>');
	}
</script>

</html>
