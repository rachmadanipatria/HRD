<div class="content">
<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">History Pengajuan Cuti</h5>
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
					<th>Nama Cuti</th>
					<th>Tanggal Pengajuan</th>
					<th>Tanggal Batas</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (empty($cuti)) { ?>
				<tr>
					<td colspan="5">Belum pernah mengajukan cuti</td>
				</tr>	
				<?php } else {
					$no = 1;
					foreach ($cuti as $key) { ?>
				<tr>
					<td><?= $no?></td>
					<td><?= $key->nama_cuti?></td>
					<td><?= $key->tgl_pengajuan?></td>
					<td><?= $key->sampai_tgl?></td>
					<td><?= $key->status?></td>
				</tr>
				<?php $no++;	} }
				?>
			</tbody>
		</table>
	</div>
</div>
				