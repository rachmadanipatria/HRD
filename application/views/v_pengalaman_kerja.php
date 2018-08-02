<div class="content">
<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Pengalaman Kerja & Pelatihan</h5>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="collapse"></a></li>
            		<li><a data-action="reload"></a></li>
            	</ul>
        	</div>
		</div>

		<div class="panel-body">	
			<legend class="text-bold">Pengalaman Kerja</legend>

			<?php
				foreach ($pengalamankerja as $row) { }
				if (empty($pengalamankerja) || $row->status == "Belum disetujui" )  { ?>
					
					<div class="col-lg-12">
						<h3>Tidak memiliki pengalaman kerja</h3>
					</div>
				

				<?php } else {
			 
				 foreach ($pengalamankerja as $key) { 
				 		if ($key->status == "Sudah disetujui"   ) { ?>
				 			<div class="col-lg-6">
								<strong class="panel-title">Penglaman kerja</strong>
								<div class="row">
									<label class="control-label col-lg-4">Nama Perusahaan </label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $key->nama_perusahaan?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Tanggal Mulai </label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $key->tgl_mulai?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Tanggal Berkahir </label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $key->tgl_berakhir?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Posisi </label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $key->posisi?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Unit</label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $key->unit?>
									</div>
								</div>

							</div>
				 	<?php	}
				 	?>				
			<?php	}  }
			?>


		</div>

		<div class="panel-body">	
			<legend class="text-bold">Pelatihan</legend>

			<?php
				foreach ($pelatihan as $key){}
				if (empty($pelatihan) ) { 
				
					?>

					<div class="col-lg-12">
						<h3>Tidak melakukan pelatihan </h3>
					</div>

				<?php } else {
			
				foreach ($pelatihan as $row) { 

						if ($row->status == "Sudah disetujui") { ?>
							<div class="col-lg-6">

								<div class="row">
									<label class="control-label col-lg-4">Nama Pelatihan </label>
									<div class="col-lg-8">
										 : &nbsp&nbsp <?= $row->nama_pelatihan?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Tahun</label>
									<div class="col-lg-8">
										 : &nbsp&nbsp ads <?= $row->tahun?>
									</div>
								</div>

								<div class="row">
									<label class="control-label col-lg-4">Sertifikat</label>
									<div class="col-lg-8">

										<?php
											if (empty($row->sertifikat)) { ?>
										 		: &nbsp&nbsp <a href="">Tidak</a>
											<?php } else { ?>
												: &nbsp&nbsp <a href="" download>Ya</a>
										<?php	
											}
										?>	

									</div>
								</div>
							</div>
					<?php	} 
				
					?>
			
			

			<?php	} } 

			?>

			
		</div>

		<div class="panel-footer">
			
			<a href="<?= base_url()?>c_user/pengalaman_kerja/1" class="btn btn-primary" style="float: right; margin: 5px">Pengalaman kerja </a>
			<a href="<?= base_url()?>c_user/pengalaman_kerja/2" class="btn btn-success" style="float: right; margin: 5px">Pelatihan</a>
			
		</div>
	</div>
	<!-- /basic datatable -->
