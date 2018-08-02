<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HRIS</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">

	<!-- /global stylesheets -->

		<!-- Core JS files datable -->

	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files datable-->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/pages/form_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/assets_user/assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<!-- /theme JS files -->



</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>assets/assets_user/assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-bubbles4"></i>
						<span class="visible-xs-inline-block position-right count">Messages</span>

						<?php
							if ($this->session->userdata('jabatan') == 4) { ?>

								<?php

									if (empty($cuti) || empty($newPPD)) {
										
									}else{
										foreach ($cuti as $key ) {
										
										}

										foreach ($newPPD as $n ) {
										
										}

										foreach ($karyawan as $row ) {
										
										}
										
										$ctr = 0;
										if ($key->status == "Disetujui") { 
											$ctr = 1;

										} 

										if ($n->status == "Disetujui") {
											$ctr = $ctr + 1;
										}

										?>
										<span class="badge bg-warning-400"><?= $ctr?></span>	

									<?php }
										
										?>

						<?php	} else {

						}
						?>


					</a>
					
					<div class="dropdown-menu dropdown-content width-350">
						<div class="dropdown-content-heading">
							Messages
							<ul class="icons-list">
								<li><a href="#"><i class="icon-compose"></i></a></li>
							</ul>
						</div>

						<ul class="media-list dropdown-content-body">
							<?php
							if ($this->session->userdata('jabatan') == 4) { ?>

								<?php

									if (empty($cuti) ||empty($newPPD) ) {

									}else{ 
										$notif = array("Cuti telah di ACC","PPD telah di ACC");
												
										for ($i=0; $i < $ctr; $i++) { ?>
											<li class="media">
												<div class="media-body">
													<a href="#" class="media-heading">
														<span class="text-semibold">HRD</span>
														<span class="media-annotation pull-right"></span>
													</a>
													<span class="text-muted"><?= $notif[$i]?></span>
												</div>
											</li>	
									<?php	}

										if ($key->status == "Disetujui") { ?>
									
									<?php } ?>

									
								<?php	}
								?>
								


						<?php	} else {

						}
						?>
					</div>
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url() ?>assets/assets_user/assets/images/placeholder.jpg" alt="">
						<span><?php 
							   echo $info_user['username'];
							   ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<!-- <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
						<li><a href="<?php echo base_url() ?>login/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url() ?>assets/assets_user/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">
										<?php 
										echo $info_user['username'];
										 ?>
									</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Bandung
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">


						<?php
							foreach ($cek as $row) {
							}

							if ($row->id_jabatan == 1 || $row->id_jabatan == 2) { ?>
								<li class="navigation-header"><span>Main</span><i class="icon-menu" title="Main pages"></a>></i></li>
								<li class="<?php echo $dashboard; ?>"><a href="<?php echo base_url() ?>c_atasan"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="<?php echo $manajemencuti; ?>"><a href="<?php echo base_url() ?>c_atasan/persetujuanCuti"><i class="fa fa-file"></i> <span>Manajemen Cuti</span></a></li>
								<li class="<?php echo $manajemenperjalanandinas; ?>"><a href="<?php echo base_url() ?>c_atasan/persetujuanPerjalananDinas"><i class="fa fa-subway"></i> <span>Manajemen Perjalanan Dinas</span></a></li>


							<?php } elseif ($row->id_jabatan == 3) { ?>
								<li class="navigation-header"><span>Main</span><i class="icon-menu" title="Main pages"></a>></i></li>
								<li class="<?php echo $dashboard; ?>"><a href="<?php echo base_url() ?>c_hrd"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="<?php echo $data_personal; ?>"><a href="<?php echo base_url() ?>c_hrd/v_pengajuan_dataPersonal"><i class="fa fa-users"></i> <span>Data Personal</span></a></li>
								<li class="<?php echo $pengalaman_kerja; ?>"><a href="<?php echo base_url() ?>c_hrd/v_pengajuan_pengalamanKerja"><i class="fa fa-book"></i> <span>Pengalaman Kerja</span></a></li>
								<li class="<?php echo $manajemencuti; ?>"><a href="<?php echo base_url() ?>c_hrd/v_pengajuan_cuti"><i class="fa fa-file-o"></i> <span>Pengajuan Cuti</span></a></li>
								<li class="<?php echo $jatahcuti; ?>"><a href="<?php echo base_url() ?>c_hrd/v_jatah_cuti_karyawan"><i class="fa fa-file"></i> <span>Manajemen Cuti</span></a></li>
								<li class="<?php echo $manajemenperjalanandinas; ?>"><a href="<?php echo base_url() ?>c_hrd/v_pengajuan_perjalanan_dinas"><i class="fa fa-subway"></i> <span>Manajemen Perjalanan Dinas</span></a></li>
								<li class="<?php echo $manajemenabsensi; ?>"><a href="<?php echo base_url() ?>c_hrd/v_manajemen_absensi"><i class="fa fa-file-text"></i> <span>Manajemen abensi</span></a></li>
								
							<?php } elseif ($row->id_jabatan == 4) { ?>
								<!-- Main -->
								<li class="navigation-header"><span>Main</span><i class="icon-menu" title="Main pages"></a>></i></li>
								<li class="<?php echo $dashboard; ?>"><a href="<?php echo base_url() ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li class="<?php echo $data_personal; ?>"><a href="<?php echo base_url() ?>c_user/data_personal"><i class="fa fa-user"></i> <span>Data Personal</span></a></li>
								<li class="<?php echo $pengalaman_kerja; ?>"><a href="<?php echo base_url() ?>c_user/pengalaman_kerja/0"><i class="fa fa-book"></i> <span>Pengalaman Kerja</span></a></li>
								<li>
									<a href=""><i class="fa fa-file"></i> <span>Manajemen Cuti</span></a>
									<ul>
										<li><a href="<?php echo base_url() ?>c_user/manajemen_cuti">Pengajuan Cuti</a></li>
										<li><a href="<?php echo base_url() ?>c_user/history_cuti">History Cuti</a></li>
									</ul>
								</li>
								<li class="">
								<a href="#"><i class="fa fa-subway"></i> <span>Manajemen Perjalanan Dinas</span></a>
									<ul>
										<li><a href="<?php echo base_url() ?>c_user/manajemen_perjalanan_dinas">Pengajuan Perjalanan Dinas</a></li>
										<li><a href="<?php echo base_url() ?>c_user/history_perjalanan_dinas">History Perjalanan Dinas</a></li>
									</ul>
								</li><!-- /main -->
						<?php	}
						?>

								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url() ?>"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Dashboard</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->