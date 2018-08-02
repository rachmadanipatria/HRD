<?php
	foreach ($datapersonal as $key) {
	}
?>
<div class="page-header">
		<!-- Toolbar -->
		<div class="navbar navbar-default navbar-xs">
			<ul class="nav navbar-nav visible-xs-block">
				<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
			</ul>
			<div class="navbar-collapse collapse" id="navbar-filter">
				<ul class="nav navbar-nav element-active-slate-400">
					<li class="active"><a href="#datakaryawan" data-toggle="tab"><i class="icon-user position-left"></i> Data Karyawan</a></li>
					<li><a href="#datapribadi" data-toggle="tab"><i class="icon-users position-left"></i> Data Pribadi </a></li>
					<li><a href="#datapendidikan" data-toggle="tab"><i class="fa fa-institution position-left"></i> Data Pendidikan </a></li>
				</ul>
			</div>
		</div>
		<!-- /toolbar -->

	</div>
<div class="content">
<!-- Basic datatable -->
    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row">
		<div class="col-lg-12">
			<div class="tabbable">
				<form id="formdatapersonal" method="POST" class="form-horizontal form-validate-jquery" action="<?= base_url()?>c_karyawan/editDataPersonal" enctype= "multipart/form-data" >
				<div class="tab-content">
				<div class="tab-pane fade in active" id="datakaryawan">

						<!-- Available hours -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Data Karyawan </h5> 
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="form-group">
									<label class="control-label col-lg-3">NIP<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nip" class="input form-control" required="required" placeholder="Masuk Nomer Induk Pegawai" value="<?=$key->nip?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Lengkap<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input id="namalengkap" type="text" name="namalengkap" class="input form-control" required="required" placeholder="Masukan nama lengkap" value="<?= $key->nama?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Jabatan  <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<select name="jabatan" class="input form-control" required="required" disabled="">
											
											<?php
												if (is_null($key->sys_jabatan_id )) { ?>
													<option value="">Pilih nama jabatan</option>		
											<?php } else { ?>
													<option selected value="<?= $key->sys_jabatan_id?>"><?= $key->nama_jabatan?></option>		
											<?php }
											?>


											<?php foreach ($jabatan as $row){ ?>
											<option value="<?= $row->id_jabatan?>"><?= $row->nama_jabatan?></option>	
											<?php } ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Unit  <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<select name="unit" class="input form-control" required="required" value="<?= $key->unit?>" disabled="">
											<option value="GA">GA</option>
											<option value="TBIA">TBIA</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Status Karyawan <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<select name="statuskaryawan" class="input form-control" required="required" value="<?= $key->status_karyawan?>" disabled>
											<?php
												if (is_null($key->status_karyawan )) { ?>
													<option value="">Pilih status karyawan</option>		
											<?php } else { ?>
													<option selected value="<?= $key->status_karyawan?>"><?= $key->status_karyawan?></option>		
											<?php }
											?>
											<option value="Karyawan tetap">Karyawan tetap</option>
											<option value="Karyawan tidak tetap">Karyawan tidak tetap</option>
											
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Pas Foto<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="file" name="pas_foto" class="input form-control" required="required" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nomor Rekening Gaji<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="norek_gaji" class="coba form-control" required="required" placeholder="Masukan nomer rekening gaji" value="<?= $key->norek_gaji?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Bank Gaji<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="bankgaji" class="coba form-control" required="required" placeholder="Masukan bank ganji" value="<?= $key->bank_gaji?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Tanggal Mulai Kerja <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="date" name="tgl_mulai_kerja" class="form-control" required="required" placeholder="Masukan tanggal mulai kerja" value="<?= $key->tgl_mulai_kerja?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Tanggal Capeg<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="date" name="tgl_capeg" class="form-control" required="required" placeholder="Masukan tanggal capeg" value="<?= $key->tgl_capeg?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Tanggal Penglap<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="date" name="tgl_penglap" class="form-control" required="required" placeholder="Masukan tanggal penglap" value="<?= $key->tgl_penglap?>" disabled>
									</div>
								</div>
							</div>
						</div>
						<!-- /available hours -->
				</div>
				<div class="tab-pane fade" id="datapribadi">
						<!-- Available hours -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Data Pribadi </h5> 
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label col-lg-3">NIK  <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nik" class="input form-control" required="required" placeholder="Masukan NIK"  value="<?= $key->nik?>" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-3">Tempat Lahir<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="tempatlahir" id="input"  class="input form-control" required="required" placeholder="Masukan tempat lahir"  value="<?= $key->tempat_lahir?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Tanggal Lahir <span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="date" name="tanggal_lahir" class="input form-control" required="required" placeholder="Masukan tanggal lahir"  value="<?= $key->tgl_lahir?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Anak Ke-1<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama_anak1" class="input form-control" required="required" placeholder="Masukan nama anak ke-1"  value="<?= $key->nama_anak1?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Anak Ke-2<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama_anak2" class="input form-control" required="required" placeholder="Masukan nama anak ke-2" value="<?= $key->nama_anak2?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Anak Ke-3<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama_anak3" class="input form-control" required="required" placeholder="Masukan nama anak ke-3" value="<?= $key->nama_anak3?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Alamat Rumah<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<textarea rows="5" cols="5" name="alamatrumah" class="input form-control" required="required" placeholder="Masukan alamat rumah" value="<?= $key->alamat_rumah?>" disabled><?= $key->alamat_rumah?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nomer Telpon Rumah<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="notlp_rumah" class="input form-control" required="required" placeholder="Masukan nomer handphone" value="<?= $key->notlp_rumah?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nomer Handphone<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nohp" class="input form-control" required="required" placeholder="Masukan nomer handphone" value="<?= $key->nohp?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Email<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="email" name="email" class="input form-control" id="email" required="required" placeholder="Masukan email" value="<?= $key->email?>" disabled >
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Ibu Kandung<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama_ibukandung" class="input form-control" required="required" placeholder="Masukan nama ibu kandung" value="<?= $key->nama_ibu_kandung?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Nama Bapak Kandung<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="nama_bapakkandung" class="input form-control" required="required" placeholder="Masukan nama bapak kandung" value="<?= $key->nama_bapak_kandung?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Alamat Orang tua<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<textarea rows="5" cols="5" name="alamat_ortu" class="input form-control" required="required" placeholder="Masukan alamat orang tua" value="<?= $key->alamat_ortu?>" disabled>"<?= $key->alamat_ortu?></textarea>
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="tab-pane fade" id="datapendidikan">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Data Pendidikan </h5> 
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label col-lg-3">Perguruan Tinggi<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="perguruan_tinggi" class="input form-control" required="required" placeholder="Masukan perguruan tinggi" value="<?= $key->perguruan_tinggi?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Level<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="level" class="input form-control" required="required" placeholder="Masukan level" value="<?= $key->level?>" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Jurusan<span class="text-danger">*</span></label>
									<div class="col-lg-9">
										<input type="text" name="jurusan" class="input form-control" required="required" placeholder="Masukan jurusan" value="<?= $key->jurusan?>" disabled>
									</div>
								</div>

								
							</div>
						</div>
				</div>
				<div class="form-group">
						<a id="cancelbutton" class="btn btn-danger" style="float: right; display: none;" >cancel</a>
						<button id="submitedit" class="btn btn-primary" style="float: right; display: none;" value="submit" type="submit">Submit</button>
					</div>
				<div>
					<a id="editbutton" class="btn btn-primary" style="float: right" >edit</a>
				</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>	
	</div>
	<!-- /basic datatable -->
