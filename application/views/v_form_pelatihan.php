<div class="content">
<!-- Basic datatable -->
    <?php echo $this->session->flashdata('pesan'); ?>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Pengalaman Kerja & Pelatihan</h5>
			
		</div>

		<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/tambahPelatihan" enctype= "multipart/form-data" >
			<fieldset class="content-group">
				
				<div class="panel-body">
					<legend class="text-bold">Pelatihan</legend>

					<div class="form-group">
						<label class="control-label col-lg-3">Nama Pelatihan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="namapelatihan" class="input form-control" required="required" placeholder="Masukan nama pelatihan"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tahun<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tahun" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Sertifikat<span class="text-danger">*</span></label>
						<div class="col-lg-2">
							<input type="radio" value="Ya" name="sertifikat" required="required"  > Ya
							
						</div>
						<div class="col-lg-2">
						<input type="radio" value="Tidak" name="sertifikat" required="required"  > Tidak
						</div>
					</div>
					
					<div class="form-group">
						<button class="btn btn-primary" style="float: right; margin: 5px" value="submit" type="submit">Submit</button>
					</div>

					</form>
				</div>
			</fieldset> 
		

		<div class="panel-footer">
			
			<a href="<?= base_url()?>c_user/pengalaman_kerja/1" class="btn btn-primary" style="float: right; margin: 5px">Pengalaman kerja </a>
			<a href="<?= base_url()?>c_user/pengalaman_kerja/2" class="btn btn-success" style="float: right; margin: 5px">Pelatihan</a>
			
		</div>
	</div>
	<!-- /basic datatable -->
