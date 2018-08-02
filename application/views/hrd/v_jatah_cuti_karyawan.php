<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Jatah Cuti Karyawan</h5>
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
									<th>Nama Pegawai</th>
									<th>Cuti tahunan</th>
									<th>Cuti alasan penting</th>
									<th>Cuti Sakit</th>
									<th>Cuti melahirkan</th>
									<th>Cuti besar</th>
									<th>Cuti keguguran</th>
									<th>Cuti diluar tanggungan yayasan</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataJatahCuti as $key) { ?>
								 <tr>
										<td><?= $key->nama?> - <?= $key->nip?></td>
										<td><?= $key->tahunan?></td>
										<td><?= $key->alasan_penting?></td>
										<td><?= $key->sakit?></td>
										<td><?= $key->melahirkan?></td>
										<td><?= $key->besar?></td>
										<td><?= $key->keguguran?></td>
										<td><?= $key->diluar_tanggungan_yayasan?></td>
										
									<td width="130">
										<a class="editJatah btn btn-primary btn-xs" data-toggle="modal" data-target=".modalEdit" id="<?= $key->id_jatah_cuti?>"><i class="fa fa-pencil fa-1x"></i></a>
									</td>
								</tr>
								<?php	}
								?>
								

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade modalEdit">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Edit Jatah Cuti</h5>
								</div>

								<form method="POST" action="<?= base_url()?>c_atasan/a_persetujuanCuti" class="form-horizontal">
									<div class="modal-body">
											<br/>
												<label style="font-size: 15px">NIP </label>
												<input name="nip" id="nip" class="form-control" readonly=""></input>
											<br/>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti tahunan </label>
													<input name="tahunan" id="tahunan" class="form-control"></input>
												</div>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti alasan penting</label>
													<input name="alasan_penting" id="alasan_penting" class="form-control"></input>
												</div>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti sakit </label>
													<input name="sakit" id="sakit" class="form-control"></input>
												</div>
											<br/>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti melahirkan </label>
													<input name="melahirkan" id="melahirkan" class="form-control"></input>
												</div>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti besar </label>
													<input name="besar" id="besar" class="form-control"></input>
												</div>
												<div class="col-md-4">
													<label style="font-size: 15px">Cuti keguguran </label>
													<input name="keguguran" id="keguguran" class="form-control"></input>
												</div>
											<br/>
												<div class="col-md-12">
													<label style="font-size: 15px">Cuti diluar tanggungan yayasan </label>
													<input style="width: 265px" name="diluar_tanggungan_yayasan" id="diluar_tanggungan_yayasan" class="form-control"></input>		
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
