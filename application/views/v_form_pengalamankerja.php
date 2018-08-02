<div class="content">
<!-- Basic datatable -->
    <?php echo $this->session->flashdata('pesan'); ?>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Pengalaman Kerja & Pelatihan</h5>
			
		</div>

		<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/tambahPengalamanKerja" enctype= "multipart/form-data" >
			<fieldset class="content-group">
				
				<div class="panel-body">
					<legend class="text-bold">Pengalaman Kerja</legend>

					<div class="form-group">
						<label class="control-label col-lg-3">Nama Perushaan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="namaperusahaan" class="input form-control" required="required" placeholder="Masuk nama perusahaan"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tanggal Mulai<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tgl_mulai" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tanggal Berakhir<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tgl_berakhir" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Posisi<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="posisi" class="input form-control" required="required" placeholder="Masukan posisi anda"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Unit  <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<select name="unit" class="input form-control" required="required" >
								<option value="General Affair">General Affair</option>
								<option value="Technology Business Incubation & Acceleration">Technology Business Incubation & Acceleration</option>
							</select>
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
