	<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Absensi Karyawan 	<a class="btn btn-success btn-info"><strong><?php echo date('d-M-Y')?></strong></a></h5>
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

						<form action="<?= base_url()?>c_hrd/inputAbsensi" method="POST">
						<div class="panel-body">
						<table class="table">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Masuk</th>
									<th>Sakit</th>
									<th>Ijin</th>
									<th>Alpha</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (empty($dataPersonal)) { ?>
									<tr>
										<td colspan="6" align="center"><h3>Absensi telah <?= date('d M Y')?> dilakukan</h3></td>
									</tr>
									<?php } else {
										$x=0;
									foreach ($dataPersonal as $key) { ?>
								<tr>
									<td><?= $key->nip?>
									<input type="hidden" name="nip[]" value="<?= $key->nip ?>"></input> 
									</td>
									<td><?= $key->nama?></td>
									<td><input required="" type="radio" value="sakit" name="<?= $key->nip?>[]"></input></td>
									<td><input required="" type="radio" value="ijin" name="<?= $key->nip?>[]"></td>
									<td ><input type="radio" value="ijin" name="<?= $key->nip?>[]"></td>
									<td width="80" align="center"><input type="radio" value="alpha" name="<?= $key->nip?>[]"></td>									
								</tr>
								<?php $x++;	} 
								?>
							</tbody>
						</table>


						<button type="submit" class="btn btn-default" style="float: right">Submit</button>
						</form>
						<?php } ?>
						</div>

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
					</div>
					<!-- /basic datatable -->
