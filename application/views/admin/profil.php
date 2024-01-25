<!DOCTYPE html>
<html lang="id-ID">

<head>
	<?php $this->load->view('templates/head'); ?>
	<style>
		.widget-user-username{
			color: black;
			font-weight: bold;
		}
		.widget-user-desc{
			color: black;
			font-weight: bold;
		}
	</style>
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
							<h1 class="m-0">Profil</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Beranda</a></li>
								<li class="breadcrumb-item active">Profil</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card card-widget widget-user">
								<div class="widget-user-header text-white" style="background: url('https://static.vecteezy.com/system/resources/thumbnails/003/475/139/small/grey-abstract-background-wallpaper-design-free-vector.jpg') center center;">
									<h3 class="widget-user-username"><?= $this->session->userdata('nama'); ?></h3>
									<h5 class="widget-user-desc"><?= $this->session->userdata('akses'); ?></h5>
								</div>
								<div class="widget-user-image">
									<img class="img-circle elevation-2" src="http://cdn.onlinewebfonts.com/svg/img_568656.png" alt="User Avatar">
								</div>
								<div class="card-footer">
									<div class="row">
										<div class="col-sm-4 border-right">
											<div class="description-block">
												<h5 class="description-header"><i class="fal fa-at text-primary"></i></h5>
												<span class="text-primary"><?= $this->session->userdata('username'); ?></span>
											</div>
										</div>
										<div class="col-sm-4 border-right">
											<div class="description-block">
												<h5 class="description-header"><i class="fal fa-id-card text-success"></i></h5>
												<span class="text-success"><?= $this->session->userdata('nama'); ?></span>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="description-block">
												<h5 class="description-header"><i class="fal fa-shield text-danger"></i></h5>
												<span class="text-danger"><?= $this->session->userdata('akses'); ?></span>
											</div>
										</div>
									</div>
								</div>
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
