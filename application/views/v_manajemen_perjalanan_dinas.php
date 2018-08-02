<div class="content">
<!-- Basic datatable -->
    <?php echo $this->session->flashdata('pesan'); ?>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Manajemen Perjalanan Dinas</h5>
		</div>

		<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/pengajuanPerjalananDinas" enctype= "multipart/form-data" >
			<fieldset class="content-group">
				
				<div class="panel-body">
					<legend class="text-bold">Manajemen Perjalanan Dinas</legend>

					<?php
					foreach ($datapersonal as $key) {
					}
					?>	

					<div class="form-group">
						<label class="control-label col-lg-3">Nama<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="namapelatihan" class="input form-control" required="required" placeholder="Masuk Nomer Induk Pegawai" value="<?= $key->nama?>" disabled  >
							<input type="hidden" name="nip[]" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->nip?>" >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Jabatan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="namajabatan[]" class="input form-control" required="required" placeholder="Masuk Nomer Induk Pegawai" value="<?=$key->nama_jabatan?>" disabled >
						</div>
					</div>

					<div>
						<a class="btn btn-primary btn-sm btn-rounded tambahkaryawan" >Tambah karyawan</a>
					</div>

					<div class="anggotaPerjalanan" >
						
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Maksud Perjalanan Dinas<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<textarea rows="5" cols="5" name="deskripsi" class="input form-control" required="required" placeholder="Masukan deksripsi perjalanan dinas"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Jenis Perjalanan Dinas<span class="text-danger">*</span></label>
							<div class="col-lg-9">
							<select name="jenisperjalanan" class="input form-control" required="required" value="<?= $key->status_karyawan?>" >
								<option value="">Pilih jenis perjalanan dinas</option>
								<optgroup label="Perjalanan dinas"> 
									<option value="Dalam negeri">Dalam negeri</option>
									<option value="Luar negeri">Luar negeri</option>
								</optgroup>
							</select>
							</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tanggal Pengajuan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tgl_pengajuan" min="<?= date('Y-m-d') ?>" class="form-control" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Tanggal Kembali<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="date" name="tgl_kembali" class="form-control" min="<?= date('Y-m-d') ?>" required="required" placeholder="Masukan tanggal capeg"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Kota Tujuan<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="kotatujuan" class="input form-control" required="required" placeholder="Masukan Kota Tujuan"  >
						</div>
					</div>




					<div class="form-group">
						<label class="control-label col-lg-3">Saranan Transportasi<span class="text-danger">*</span></label>
							<div class="col-lg-9">
							<select name="transportasi" class="input form-control" required="required" value="<?= $key->status_karyawan?>" >
								<option value="">Pilih jenis saranan transportasi</option>
								<optgroup label="Mountain Time Zone"> 
									<option value="Pesawat">Pesawat</option>
									<option value="Mobil">Mobil</option>
									<option value="Kereta">Kereta</option>
								</optgroup>
							</select>
							</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Anggaran Yang Digunakan Saat Ini<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="number" name="anggaransaatini" class="form-control" required="required" placeholder="Anggaran yang digunakan saat ini"  >
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-lg-3">Saldo Akhir Anggaran<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="number" name="anggaranakhir" class="form-control" required="required" placeholder="Saldo akhir anggaran"  >
						</div>
					</div>

				</div>
			</fieldset> 
		


		<div class="panel-footer">

			<?php
			 foreach ($newPPD as $row ) {
			 	
			 	if ($row->p_atasan1 == "Sudah disetujui" && $row->p_atasan2 == "Sudah disetujui") { ?>
				<a  class="btn btn-success" style="float: left;  margin: 5px" href="<?= base_url()?>c_hrd/cetak_suratPPD/<?= $row->id_perjalanan_dinas?>" >Print surat</a>
			 		
			 <?php	} else { ?>

			<?php 	}
			 }
			?>
			<a  class="btn btn-danger" style="float: right;  margin: 5px" href="" >cancel</a>
			<button class="btn btn-primary" style="float: right;  margin: 5px" value="submit" type="submit">Submit</button>
					
			</form>
		</div>
	</div>
	<!-- /basic datatable -->
