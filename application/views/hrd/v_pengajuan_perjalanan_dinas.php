<div class="content">
					<!-- Basic datatable -->
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
						<th>Nama Pengaju</th>
						<th>Jenis Perjalanan</th>
						<th>Transport</th>
						<th>Kota Tujuan</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($dataPPD as $key) { ?>
						<tr>
							<td><?= $key->nip?></td>
							<td><?= $key->nama?></td>
							<td><?= $key->jenis_perjalan?></td>
							<td><?= $key->transportasi?></td>
							<td><?= $key->kota_tujuan?></td>
							<td><a class="btn btn-success btn-sm"><?= $key->p_atasan1?></a></td>
							<td class="text-center"><a class="fa fa-print fa-1x" href="<?= base_url()?>c_hrd/cetak_suratPPD/<?= $key->id_perjalanan_dinas?>"></a></td>
						</tr>
					<?php	}
					?>
				</tbody>
			</table>
		</div>
</div>