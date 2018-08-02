<div class="content">
    <?php echo $this->session->flashdata('pesan'); ?>
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Pengajuan Perjalanan Dinas</h5>
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
						<th>Jenis Perjalanan</th>
						<th>Kota Tujuan</th>
						<th>Transportasi</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if ($this->session->userdata('jabatan') == 1 ) { 
						foreach ($dataPerjalananDinas as $key) { ?>
						<tr>
						<?php
							if ($key->p_atasan1 == "Belum disetujui") { ?>
							<td><?= $key->nip?></td>
							<td><?= $key->nama?></td>
							<td><?= $key->jenis_perjalan?></td>
							<td><?= $key->kota_tujuan?></td>
							<td><?= $key->transportasi?></td>
							<td>
						<?php	if ($key->p_atasan1 == "Belum disetujui") { ?>
							<a class="btn btn-danger btn-sm"><?= $key->p_atasan1?></a>
						<?php } elseif ($key->p_atasan1 == "Sudah disetujui") { ?>
							<a class="btn btn-success btn-sm"><?= $key->p_atasan1?></a>
						<?php } elseif ($key->p_atasan1 == "Tidak disetujui") { ?>
							<a class="btn btn-danger btn-sm"><?= $key->p_atasan1?></a>
						<?php } ?>
						</td>
						<?php	}
						?>
						<td><a id="<?= $key->id_perjalanan_dinas?>" class="detailDinas fa fa-search fa-1x" data-toggle="modal" data-target="#modal_form_horizontal"></a></td>
						</tr>
						<?php }} else {
							foreach ($dataPerjalananDinas2 as $key) { ?>
						<tr>
						<?php
							if ($key->p_atasan2 == "Belum disetujui") { ?>
							<td><?= $key->nip?></td>
							<td><?= $key->nama?></td>
							<td><?= $key->jenis_perjalan?></td>
							<td><?= $key->kota_tujuan?></td>
							<td><?= $key->transportasi?></td>
							<td>
						<?php	if ($key->p_atasan2 == "Belum disetujui") { ?>
							<a class="btn btn-danger btn-sm"><?= $key->p_atasan2?></a>
						<?php } elseif ($key->p_atasan2 == "Sudah disetujui") { ?>
							<a class="btn btn-success btn-sm"><?= $key->p_atasan2?></a>
						<?php } elseif ($key->p_atasan2 == "Tidak disetujui") { ?>
							<a class="btn btn-danger btn-sm"><?= $key->p_atasan2?></a>
						<?php } ?>
						</td>
						<?php	}
						?>
							
						<td><a id="<?= $key->id_perjalanan_dinas?>" class="detailDinas fa fa-search fa-1x" data-toggle="modal" data-target="#modal_form_horizontal"></a></td>
						</tr>	
					<?php	} }
					?>

					<!-- Horizontal form modal -->
					<div id="modal_form_horizontal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h5 class="modal-title">Detail Pengajuan Perjalanan Dinas</h5>
								</div>

								<div class="content_modal">
									
								</div>
								
							</div>
						</div>
					</div>
					<!-- /horizontal form modal -->
				</tbody>
			</table>
		</div>
