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
									<th>Unit</th>
									<th>Jabatan</th>
									<th>Nama Perusahaan</th>
									<th>Posisi</th>
									<th>Tgl Mulai</th>
									<th>Tgl Berkahir</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataPengalamanKerja as $key) { ?>
								<tr>
									<td><?= $key->nip?></td>
									<td><?= $key->nama?></td>
									<td><?= $key->unit?></td>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->nama_perusahaan?></td>
									<td><?= $key->posisi?></td>
									<td><?= $key->tgl_mulai?></td>
									<td><?= $key->tgl_berakhir?></td>
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
									<td><a class="updateData fa fa-search fa-1x" data-toggle="modal" id="<?= $key->id_pengalamankerja?>" data-target="#modal_form_horizontal"></a></td>
								</tr>
								<?php	}
								?>

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content modal-pengalamankerja">
								
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
							</tbody>
						</table>
					</div>

					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Pengajuan Pelatihan</h5>
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
									<th>Unit</th>
									<th>Jabatan</th>
									<th>Nama Pelatihan</th>
									<th>Tahun</th>
									<th>Sertifikat</th>
									<th>Status</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dataPelatihan as $row) { ?>
								<tr>
									<td><?= $row->nip?></td>
									<td><?= $row->nama?></td>
									<td><?= $key->nama_jabatan?></td>
									<td><?= $key->unit?></td>
									<td><?= $row->nama_pelatihan?></td>
									<td><?= $row->tahun?></td>
									<td><?= $row->sertifikat?></td>
									<td>
										<?php
											if ($row->status == "Belum disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $row->status?></a>
											<?php } elseif ($row->status == "Sudah disetujui") { ?>
												<a class="btn btn-success btn-sm"><?= $row->status?></a>
											<?php } elseif ($row->status == "Tidak disetujui") { ?>
												<a class="btn btn-danger btn-sm"><?= $row->status?></a>
										<?php	}
										?>
									</td>
									<td><a class="updateStatus fa fa-search fa-1x" data-toggle="modal" id="<?= $row->id_pelatihan?>" data-target="#modal_form_vertical"></a></td>
								</tr>
								<?php	}
								?>

					<!-- Horizontal form modal -->
					<div id="modal_form_vertical" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content modal-pelatihan" style="height: 300px"> 
								
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
