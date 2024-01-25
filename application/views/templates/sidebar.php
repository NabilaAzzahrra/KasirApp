<aside class="main-sidebar sidebar-light-info elevation-4">
	<a href="#" class="brand-link">
		<img src="https://idn-static-assets.s3-ap-southeast-1.amazonaws.com/school/10104.png" weight="35px" height="35px" style="opacity: .8">
		<span class="brand-text font-weight-light">Kasir App</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="http://cdn.onlinewebfonts.com/svg/img_568656.png" class="img-circle elevation-2" alt="MI20A">
			</div>
			<div class="info">
				<a href="<?= base_url($this->session->userdata('akses') . '/profil'); ?>" class="d-block"><?= $this->session->userdata('nama'); ?></a>
			</div>
		</div>
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Cari" aria-label="Cari">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fal fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item menu-<?= $this->session->userdata('administrator'); ?>">
					<a href="#" class="nav-link<?= $this->session->userdata('administrator_status'); ?>">
						<i class="nav-icon fal fa-user-shield"></i>
						<p>
							Administrator
							<i class="right fal fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/user'); ?>" class="nav-link<?= $this->session->userdata('user'); ?>">
								<i class="fal fa-<?= $this->session->userdata('user_dot'); ?>circle nav-icon"></i>
								<p>User</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin'); ?>" class="nav-link<?= $this->session->userdata('beranda'); ?>">
						<i class="nav-icon fal fa-home"></i>
						<p>Beranda</p>
					</a>
				</li>
				<li class="nav-item menu-<?= $this->session->userdata('master'); ?>">
					<a href=" #" class="nav-link<?= $this->session->userdata('master_status'); ?>">
						<i class="nav-icon fal fa-bars"></i>
						<p>
							Master
							<i class="right fal fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/kategori'); ?>" class="nav-link<?= $this->session->userdata('kategori'); ?>">
								<i class="fal fa-<?= $this->session->userdata('kategori_dot'); ?>circle nav-icon"></i>
								<p>Kategori</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/owner'); ?>" class="nav-link<?= $this->session->userdata('owner'); ?>">
								<i class="fal fa-<?= $this->session->userdata('owner_dot'); ?>circle nav-icon"></i>
								<p>Owner</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/customer'); ?>" class="nav-link<?= $this->session->userdata('customer'); ?>">
								<i class="fal fa-<?= $this->session->userdata('customer_dot'); ?>circle nav-icon"></i>
								<p>Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/supplier'); ?>" class="nav-link<?= $this->session->userdata('supplier'); ?>">
								<i class="fal fa-<?= $this->session->userdata('supplier_dot'); ?>circle nav-icon"></i>
								<p>Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/produk'); ?>" class="nav-link<?= $this->session->userdata('produk'); ?>">
								<i class="fal fa-<?= $this->session->userdata('produk_dot'); ?>circle nav-icon"></i>
								<p>Produk</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item menu-<?= $this->session->userdata('transaksi'); ?>">
					<a href="#" class="nav-link<?= $this->session->userdata('transaksi_status'); ?>">
						<i class="nav-icon fal fa-store"></i>
						<p>
							Transaksi
							<i class="right fal fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/penjualan'); ?>" class="nav-link<?= $this->session->userdata('penjualan'); ?>">
								<i class="fal fa-<?= $this->session->userdata('penjualan_dot'); ?>circle nav-icon"></i>
								<p>Penjualan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/pembelian'); ?>" class="nav-link<?= $this->session->userdata('pembelian'); ?>">
								<i class="fal fa-<?= $this->session->userdata('pembelian_dot'); ?>circle nav-icon"></i>
								<p>Pembelian</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item menu-<?= $this->session->userdata('laporan'); ?>">
					<a href="#" class="nav-link<?= $this->session->userdata('laporan_status'); ?>">
						<i class="nav-icon fal fa-book"></i>
						<p>
							Laporan
							<i class="right fal fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_re'); ?>" class="nav-link<?= $this->session->userdata('laporan_re'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_re_dot'); ?>circle nav-icon"></i>
								<p>RE</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_owner'); ?>" class="nav-link<?= $this->session->userdata('laporan_owner'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_owner_dot'); ?>circle nav-icon"></i>
								<p>Owner</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_supplier'); ?>" class="nav-link<?= $this->session->userdata('laporan_supplier'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_supplier_dot'); ?>circle nav-icon"></i>
								<p>Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_seluruh_supplier'); ?>" class="nav-link<?= $this->session->userdata('laporan_seluruh_supplier'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_seluruh_supplier_dot'); ?>circle nav-icon"></i>
								<p>Seluruh Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_piutang'); ?>" class="nav-link<?= $this->session->userdata('laporan_piutang'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_piutang_dot'); ?>circle nav-icon"></i>
								<p>Piutang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url($this->session->userdata('akses') . '/laporan_saldo_periode'); ?>" class="nav-link<?= $this->session->userdata('laporan_saldo_periode'); ?>">
								<i class="fal fa-<?= $this->session->userdata('laporan_saldo_periode_dot'); ?>circle nav-icon"></i>
								<p>Saldo Per Periode</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
