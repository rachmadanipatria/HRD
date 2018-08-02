<div class="content">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Data Karyawan</h5>
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
									<th>Nama Karyawan</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($karyawan as $key) { ?>
								<tr>
									<td><?= $key->nip?></td>
									<td><?= $key->nama_karyawan?></td>
									<td><?= $key->alamat?></td>
									<td><?= $key->email?></td>
									<td><?= $key->nama_jabatan?></td>
									<td width="130"> <a class="btn btn-primary btn-sm" href=""><i class="fa fa-edit"></i></a>
										 <a class="btn btn-danger btn-sm" href=""><i class="fa fa-remove"></i></a>
									</td>
								</tr>
								<?php	}
								?>
							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->
