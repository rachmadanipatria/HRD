<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Pengajuan Pengalaman Kerja</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			 
			                	</ul>
		                	</div>
						</div>

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama</th>
									<th>Jenis Cuti</th>
									<th>Tanggal Pengajuan</th>
									<th>Sampai Tanggal</th>
									<th>Lama Cuti</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataCuti as $key) { ?>
								 <tr>
										<td><?= $key->nip?></td>
										<td><?= $key->nama?></td>
										<td><?= $key->nama_cuti?></td>
										<td><?= $key->tgl_pengajuan?></td>
										<td><?= $key->sampai_tgl?></td>
										<td><?= $key->lama_cuti?></td>
										<td>
									<?php	if ($key->p_ataasan1 == "Belum disetujui") { ?>
										<a class="btn btn-danger btn-sm"><?= $key->p_ataasan1?></a>
									<?php } elseif ($key->p_ataasan1 == "Sudah disetujui") { ?>
										<a class="btn btn-success btn-sm"><?= $key->p_ataasan1?></a>
									<?php } elseif ($key->p_ataasan1 == "Tidak disetujui") { ?>
										<a class="btn btn-danger btn-sm"><?= $key->p_ataasan1?></a>
									<?php } ?>
									</td>
									<td><a class="fa fa-print fa-1x" href="<?= base_url()?>c_hrd/cetak_suratCuti/<?= $key->ms_karyawan_id?>/<?= $key->id_pengajuan_cuti?>" ></a></td>
								</tr>
								<?php	}
								?>
								

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Detail Pengajuan Cuti</h5>
								</div>

								<form method="POST" action="<?= base_url()?>c_atasan/a_persetujuanCuti" class="form-horizontal">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label col-sm-3">NIP</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nip?></label>
												<input type="hidden" name="id_pengajuan_cuti" value="<?= $key->id_pengajuan_cuti?>"></input>
												
											</div>
											<class="form-group">
											<label class="control-label col-sm-3">Nama</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama?></label>
											</div>
											<label class="control-label col-sm-3">Jenis Cuti</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->nama_cuti?></label>
											</div>
											<label class="control-label col-sm-3">Tanggal Pengajuan</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->tgl_pengajuan?></label>
											</div>
											<label class="control-label col-sm-3">Sampai Tanggal</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->sampai_tgl?></label>
											</div>
											<label class="control-label col-sm-3">Persetujuan atasan 1</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->p_ataasan1?></label>
											</div>
											<label class="control-label col-sm-3">Persetujuan atasan 2</label>
											<div class="col-sm-9">
												<label class="control-label"><?= $key->p_ataasan2?></label>
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
