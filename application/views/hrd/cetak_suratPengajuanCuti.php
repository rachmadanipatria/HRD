<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Surat Pengajuan Cuti</title>
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body onload="window.print();" >
<div class="box"> 
    <div class="box-body">
    		<?php foreach ($pengajuanCuti as $key) {
    			
    		}

    		?>
    		<?php foreach ($jatahCuti as $row) {
    			
    		}

    		if ($key->ms_cuti_id == 1) {
    			$sisa = $row->tahunan;
    		} elseif ($key->ms_cuti_id == 2) {
    			$sisa = $row->alasan_penting;
    		} elseif ($key->ms_cuti_id == 3) {
    			$sisa = $row->Sakit;
    		} elseif ($key->ms_cuti_id == 4) {
    			$sisa = $row->melahirkan;
    		} elseif ($key->ms_cuti_id == 5) {
    			$sisa = $row->besar;
    		} elseif ($key->ms_cuti_id == 6) {
    			$sisa = $row->keguguran;
    		} elseif ($key->ms_cuti_id == 7) {
    			$sisa = $row->diluar_tanggungan_yayasan;
    		}
    		?>
    		Keputusan Dewan Pengurus Yayasan Pendidikan Telkom
    		<br>
    		Nomor :
    		<br>
    		Tanggal : <?php echo date('d-m-Y')?>
    		<hr>
    		<div class="col-md-12" align="center" style="margin-bottom: 10px">PERMOHONAN <?= strtoupper($key->nama_cuti) ?></div>
		<table class="table table-bordered table-striped" border="1">
			<tr>
				<td width="250" style="text-align: center;">Nama/NIP</td>
				<td width="250" style="text-align: center;">Posisi</td>
				<td width="250" style="text-align: center;">Lokasi Kerja</td>
	    	</tr>
    		<tr>
    			<td style="text-align: center;"><?= $key->nama?> / <?= $key->nip?></td>
    			<td style="text-align: center;"><?= $key->nama_jabatan?></td>
    			<td style="text-align: center;">Bandung Techno Park</td>
    		</tr>
    		<tr>
    			<td style="text-align: center;">Catatan Sisa Cuti Sampai Dengan Saat Ini</td>
    			<td style="text-align: center;">Cuti Yang Diminta Jumlah, Mulai & Berakhir</td>
    			<td style="text-align: center;">Sisa Hak Cuti</td>
    		</tr>
    		<tr>
    			<td style="text-align: center;"><?= $sisa+$key->lama_cuti ?> Hari Kerja</td>
    			<td style="text-align: center;">
    			<?= $key->lama_cuti?> Hari Kerja
    			<br>
    			<br>
    			Tgl <?= $key->tgl_pengajuan?> - <?= $key->sampai_tgl?>
    			</td>
    			<td style="text-align: center;"><?= $sisa?> Hari Kerja</td>
    		</tr>
    		<tr>
    			<td style="text-align: center;">Paraf Petugas SDM</td>
    			<td style="text-align: center;" colspan="2">Alamat Cuti/No Telepon Pemohon</td>
    		</tr>
    		<tr>
    			<td style="text-align: center;">
    				<br>
    				<br>
    				<br>
    				<br>
    			</td>
    			<td style="text-align: center;" colspan="2"><?= $key->nohp?></td>
    		</tr>
    		<tr>
    			<td style="text-align: center;">Pejabat Yang Merekomendsikan Setuju / Tidak Setuju</td>
    			<td style="text-align: center;">Pejabat Yang Berwenang</td>
    			<td style="text-align: center;">Pemohon</td>
    		</tr>
    		<tr>
    			<td style="text-align: center;">
    			GM/SM/MAN
    			<br>
				<br>
				<br>
				<br>
				<br>
    			</td>
    			<td style="text-align: center;">
    			DIREKTUR
    			<br>
				<br>
				<br>
				<br>
				<br>
    			</td>
    			<td style="text-align: center;">
    			BANDUNG, <?= date('d-m-Y')?>
    			<br>
				<br>
				<br>
				<br>
				<br>
    			</td>
    		</tr>
    	</table>
    </div>
</div>
</body>
</html>