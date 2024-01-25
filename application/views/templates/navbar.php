<nav class="main-header navbar navbar-expand navbar-info navbar-dark border-0">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fal fa-bars"></i></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fal fa-expand-arrows-alt"></i>
			</a>
		</li>
		<li class="nav-item">
			<a id="logout" class="nav-link"><i class="fal fa-right-from-bracket"></i></a>
		</li>
	</ul>
</nav>
<div id="ModalLogout" class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Logout</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Apakah anda yakin untuk logout? Anda akan dialihkan ke halaman login jika sudah yakin.</p>
			</div>
			<div class="modal-footer justify-content-between">
				<a class="btn btn-block bg-gradient-success" href="<?= base_url($this->session->userdata('akses') . '/logout'); ?>">OK</a>
				<button type="button" class="btn btn-block bg-gradient-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>
