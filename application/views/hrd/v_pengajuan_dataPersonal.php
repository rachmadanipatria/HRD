	<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Pengajuan Data Personal<button data-toggle="modal" data-target="#modal_tambah_karyawan" class="btn btn-primary btn-xs" style="margin: 5px"><i class="fa fa-plus"></i> Tambah karyawan	</button></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			 
			                	</ul>
		                	</div>
						</div>

						<div>
							<?php
								if ($this->session->flashdata('success')) { ?>
						 		<div class="col-md-12 alert alert-success"><?php echo $this->session->flashdata('success')?> 
				    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 				</div>
							<?php } elseif ($this->session->flashdata('failed')) { ?>
								<div class="col-md-12 alert alert-danger"><?php echo $this->session->flashdata('failed')?> 
				    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				 				</div>
							<?php }
							?>
						</div>

						
						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Jabatan</th>
									<th>Unit Kerja</th>
									<th>No hp</th>
									<th>Email</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataUpdatePersonal as $key) { ?>
								<tr>
									<td><?= $key->nip?></td>
									<td><?= $key->nama?></td>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->unit?></td>
									<td><?= $key->nohp?></td>
									<td><?= $key->email?></td>
									<td>
										<?php
											if ($key->status == "Belum disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $key->status?></a>
											<?php } elseif ($key->status == "Sudah disetujui") { ?>
												<a class="btn btn-success btn-sm"><?= $key->status?></a>
											<?php } elseif ($key->status == "Tidak disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $key->status?></a>
										<?php	}
										?>
									</td>
									<td><a class="fa fa-search fa-1x" data-toggle="modal" data-target="#modal_form_horizontal"></a></td>
								</tr>
								<?php	}
								?>

					<div id="modal_tambah_karyawan" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Tambah Karyawan</h5>
								</div>
								<form method="POST" action="<?= base_url()?>c_hrd/tambah_karyawan">
								<div class="modal-body">
									<div class="form-group" style="margin: 5px">
										<label class="control-label col-sm-3">NIP</label>
										<div class="col-sm-8">
											<input class="form-control" name="nip" placeholder="NIP"></input>
										</div>
									</div>
									<br>
									<div class="form-group" style="margin: 5px">
										<label class="control-label col-sm-3">Nama Karyawan</label>
										<div class="col-sm-8">
											<input class="form-control" name="nama" placeholder="Nama Karyawan"></input>
										</div>
									</div>
									<div class="form-group" style="margin: 5px">
										<label class="control-label col-sm-3">Jabatan</label>
										<div class="col-sm-8">
											<select class="form-control" name="jabatan">
													<option value="Jabatan" selected="">Jabatan</option>
												<?php
													foreach ($jabatan as $row) { ?>
													<option value="<?= $row->id_jabatan?>"><?= $row->nama_jabatan?></option>
												<?php	}
												?>
											</select>
										</div>
									</div>
									<div class="form-group" style="margin: 5px">
										<label class="control-label col-sm-3">Username</label>
										<div class="col-sm-8">
											<input class="form-control" name="username" placeholder="Username"></input>
										</div>
									</div>
									<div class="form-group" style="margin: 5px">
										<label class="control-label col-sm-3">Password</label>
										<div class="col-sm-8">
											<input class="form-control" name="password" placeholder="Password"></input>
										</div>
									</div>

								</div>
								<div class="modal-footer" style="margin-top: 110px">
										<button type="submit"  class="btn btn-success">Submit</button>
								</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Pengajuan update data personal</h5>
								</div>

								<form method="POST" action="<?= base_url()?>c_hrd/a_persetujuanDataPersonal" class="form-horizontal">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label col-sm-3">NIP</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nip?></label>
												<input type="hidden" name="id" value="<?= $key->id_pengajuan?>"></input>
												<input type="hidden" name="nip" value="<?= $key->nip?>"></input>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">NIK</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nik?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Jabatan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_jabatan?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Unit</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->unit?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Pas Foto</label>
											<div class="col-sm-9">
												<img style="height: 90px; width: 100px" src="<?= base_url()?>assets/images/foto_pas/<?=$key->foto?>">
												<input name="foto" type="hidden" value="<?=$key->foto?>"></input>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Status Karyawan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->status_karyawan?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Tempat Lahir</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tempat_lahir?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama  Anak ke-1</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_anak1?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama Anak ke-2</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_anak2?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama Anak ke-3</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_anak3?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Alamat Rumah</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->alamat_rumah	?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nomer telpon Rumah</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->notlp_rumah?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nomer Handphone</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nohp?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Email</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->email?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama Ibu Kandung</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_ibu_kandung?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nama Bapak Kandung</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_bapak_kandung?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Alamat Orang Tua</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->alamat_ortu?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Perguruan Tinggi</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->perguruan_tinggi?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Level</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->level?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Jurusan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->jurusan?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Nomer Rekening Gaji</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->norek_gaji?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Bank Gaji</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->bank_gaji?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Tanggal Mulai Kerja</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_mulai_kerja?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Tanggal Capeg</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_capeg?></label>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Tanggal Penglap</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_penglap?></label>
											</div>
										</div>
									</div>

									<div class="modal-footer">
										<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
										<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
										
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
