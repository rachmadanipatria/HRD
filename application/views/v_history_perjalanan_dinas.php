<div class="content">
<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">History Perjalanan Dinas</h5>
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
					<th>No</th>
					<th>Deskripsi</th>
					<th>Jenis Perjalanan</th>
					<th>Kota Tujuan</th>
					<th>Transportasi</th>
					<th>Tanggal Berangkat</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (empty($perjalanandinas)) { ?>
				<tr>
					<td colspan="8">Belum pernah mengajukan cuti</td>
				</tr>	
				<?php } else {
					$no = 1;
					foreach ($perjalanandinas as $key) { ?>
				<tr>
					<td><?= $no?></td>
					<td><?= $key->deskripsi_perjalanan?></td>
					<td><?= $key->jenis_perjalan?></td>
					<td><?= $key->kota_tujuan?></td>
					<td><?= $key->transportasi?></td>
					<td><?= $key->tgl_pengajuan?></td>
					<td><?= $key->tgl_kembali?></td>
					<td><?= $key->status?></td>
				</tr>
				<?php $no++;	} }
				?>
			</tbody>
		</table>
	</div>
</div>