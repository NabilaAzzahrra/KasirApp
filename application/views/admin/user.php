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
							<h1 class="m-0">User</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Beranda</a></li>
								<li class="breadcrumb-item active">Administrator</li>
								<li class="breadcrumb-item active">User</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card card-outline card-info">
								<div class="card-header">
									<h3 class="card-title">Daftar User</h3>
									<button id="tambahkan" class="btn bg-gradient-warning float-right" onclick="return tambah()">
										<i class="fal fa-plus-circle"></i>
									</button>
								</div>
								<div class="card-body">
									<table id="tabelku" class="table table-bordered">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th class="text-center">Username</th>
												<th class="text-center">Password</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Akses</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach ($read as $d) {
											?>
												<tr>
													<td class="text-center"><?= $no++ ?>.</td>
													<td class="text-center"><?= $d->username ?></td>
													<td class="text-center"><?= str_repeat("*", strlen($d->password)); ?></td>
													<td class="text-center"><?= $d->nama ?></td>
													<td class="text-center"><?= $d->akses ?></td>
													<td class="text-center">
														<div class="btn-group">
															<button class="btn bg-gradient-warning" onclick="return ubah(`<?= $d->username ?>`, `<?= $d->password ?>`, `<?= $d->nama ?>`, `<?= $d->akses ?>`)"><i class="fal fa-edit"></i></button>
															<button class="btn bg-gradient-warning" onclick="return hapus(`<?= $d->username ?>`)"><i class="fal fa-trash"></i></button>
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
						<button type="button" class="close" data-dismiss="modal" aria-d-none="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username" disabled>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control" placeholder="Nama">
							</div>
							<div class="form-group">
								<label>Akses</label>
								<select name="akses" class="form-control">
									<option value="" disabled selected hidden>Akses</option>
									<option value="Admin">Admin</option>
									<option value="Kasir">Kasir</option>
								</select>
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
</body>
<?php $this->load->view('templates/script'); ?>
<script>
	$(function() {
		<?php if ($this->session->flashdata('cannot')) { ?>
			toastr.error('User ini adalah admin dan tidak dapat dihapus.');
		<?php } elseif ($this->session->flashdata('exist')) { ?>
			toastr.error('Username tersebut sudah dipakai.');
		<?php } ?>
		$("#tabelku").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"language": {
				"url": "<?= base_url('assets/plugins/datatables/i18n/id.json'); ?>"
			}
		});
		$('.select2').select2({
			dropdownParent: $('#Modal')
		});
		$('#Modal').on('shown.bs.modal', function() {
			$('[name="username"]').focus();
		});
		$('[name="form"]').validate({
			rules: {
				username: {
					required: true
				},
				password: {
					required: true
				},
				nama: {
					required: true
				},
				akses: {
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
	});

	function tambah() {
		$('#Modal').modal('show');
		$('#modal-header').html('Tambah User');
		$('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
		$('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
		$('#modal-body-update-or-create').removeClass('d-none');
		$('#modal-body-delete').addClass('d-none');
		$('[name="username"]').val("").removeAttr('disabled');
		$('[name="password"]').val("");
		$('[name="nama"]').val("");
		$('[name="akses"]').val("");
		document.form.action = '<?= base_url('Admin/user_add'); ?>';
	}

	function ubah(username, password, nama, akses) {
		$('#Modal').modal('show');
		$('#modal-header').html('Ubah User');
		$('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
		$('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
		$('#modal-body-update-or-create').removeClass('d-none');
		$('#modal-body-delete').addClass('d-none');
		$('[name="id"]').val(username);
		$('[name="username"]').val(username).attr('disabled', 'disabled');
		$('[name="password"]').val(password);
		$('[name="nama"]').val(nama);
		$('[name="akses"]').val(akses);
		document.form.action = '<?= base_url('Admin/user_update'); ?>';
	}

	function hapus(username) {
		$('#Modal').modal('show');
		$('#modal-header').html('Hapus User');
		$('#batal').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
		$('#modal-button').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
		$('#modal-body-update-or-create').addClass('d-none');
		$('#modal-body-delete').removeClass('d-none');
		$('[name="id"]').val(username);
		$('#name-delete').html(username);
		document.form.action = '<?= base_url('Admin/user_delete'); ?>';
	}
</script>

</html>
