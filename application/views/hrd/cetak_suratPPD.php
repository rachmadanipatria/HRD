<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Surat Perintah Perjalanan Dinas</title>
	<link href="<?php echo base_url() ?>assets/assets_user/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body onload="window.print();" >
<div class="box"> 
    <div class="box-body">
    	Lampiran IV : Keputusan Dewan Pengurus Yayasan
    	<br>
    	Nomor :
    	<br>
    	Tanggal : 
    	<br>
    	Perihal : peraturan Perjalanan Dinas Di Lingkungan Yayasan Pendidikan Telkom
    	<hr>

    	<div class="col-md-12" style="text-align: center;">
    	<STRONG>SURAT PERINTAH PERJALANAN DINAS (SPPD)</STRONG>
    	<hr width="350">
    	Nomor : ....../SPPD/DGA/.......
    	</div>
        Dengan ini kami mohon persetujuan bagi pegawai yang namanya tersebut di bawwah ini untuk diberikan Surat Perintah Perjalanan Dinas (SPPD) sebagai berikut :

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama / NIP</th>
                    <th>Posisi</th>
                    <th>Lokasi Kerja</th>
                    <th width="150">Paraf Atasan Lansung Khusus pegawai dari lokasi kerja lain</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($anggotaPPD as $agtPPD ) { ?>
                <tr>
                    <td><?= $no?></td>                        
                    <td><?= $agtPPD->nama?> / <?= $agtPPD->nip ?></td>                        
                    <td><?= $agtPPD->nama_jabatan?></td>                        
                    <td>Bandung</td>  
                </tr>
                <?php  $no++;  }
                ?>
                   
            </tbody>
        </table>

        <?php
            foreach ($dataPPD as $data) {
            }
        ?>

        <table>
        <tr>
         <td>Maksud Perjalanan Dinas</td>
         <td>:</td>
         <td><?= $data->deskripsi_perjalanan?> </td>
        </tr>
        <tr>
            <td width="">Jenis Perjalanan Dinas</td>
            <td>:</td>
            <td><?= $data->jenis_perjalan?></td>
        </tr>
        <tr>
            <td>Lama Perjalanan Dinas</td>
            <td>:</td>
            <td> <?= $data->tgl_pengajuan?> s/d <?= $data->tgl_kembali?> (<?= $data->lama_perjalanan?>)</td>
        </tr>
        <tr>
            <td> Kota Tujuan</td>
            <td>:</td>
            <td><?= $data->kota_tujuan?></td>
        </tr>
        <tr>
            <td>Sarana Transportasi</td>
            <td>:</td>
            <td><?= $data->transportasi?></td>
        </tr>
        <tr>
            <td>Catatan</td>
            <td>:</td>
            <td>Saldo akhir Anggaran SPPD per tanggal <?= date('d-m-Y')?> = Rp. <?= $data->anggaran_akhir?></td>
        </tr>
        </table>

    	<hr>
    	
        <div class="col-md-12"></div>
        <div class="col-md-6" style="float: left;">
            <p>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Menyetujui
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                _______________________
                


            </p>
        </div>
    	<div class="col-md-6" style="float: right;">
			<p style="float: right;">
				Bandung, <?php echo date('d-M-Y')?>
				<br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pemohon
				<br>
				<br>
				<br>
				<br>
				<br>
				________________________
				<br>
				Jabatan : ________________


			</p>
		</div>
        </div>
    </div>
</div>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<body onload="window.print();" >
<div class="box"> 
    <div class="box-body">
        Lampiran IV : Keputusan Dewan Prngurus Yayasan
        <br>
        Nomor :
        <br>
        Tanggal : 
        <br>
        Perihal : peraturan Perjalanan Dinas Di Lingkungan Yayasan Pendidikan Telkom
        <hr>

        <div class="col-md-12" style="text-align: center;">
        <STRONG>SURAT PERINTAH PERJALANAN DINAS (SPPD)</STRONG>
        <hr width="350">
        Nomor : ....../SPPD/DGA/.......
        </div>
        <hr>
        <?php
            foreach ($dataPPD as $key) {
            }
        ?>
        <table>
            <tr>
                <td>1. Nama / NIP</td>
                <td>:</td>
                <td>&nbsp <?= $key->nama?></td>
            </tr>
            <tr>
                <td>2. Jabatan / Tingkat</td>
                <td>:</td>
                <td>&nbsp <?= $key->nama_jabatan?></td>
            </tr>
            <tr>
                <td>3. Maksud Perjalanan Dinas</td>
                <td>:</td>
                <td>&nbsp <?= $key->deskripsi_perjalanan?></td>
            </tr>
            <tr>
                <td>4. Sarana Transportasi</td>
                <td>:</td>
                <td>&nbsp <?= $key->transportasi?></td>
            </tr>
            <tr>
                <td>5. a. Lama Waktu Perjalanan Dinas</td>
                <td>:</td>
                <td>&nbsp <?= $key->lama_perjalanan?> Hari</td>
            </tr>
            <tr>
                <td>&nbsp&nbsp&nbsp b. Tanggal Berangkat </td>
                <td>:</td>
                <td>&nbsp <?= $key->tgl_pengajuan?></td>
            </tr>
            <tr>
                <td>&nbsp&nbsp&nbsp c. Tanggal Kembali </td>
                <td>:</td>
                <td>&nbsp <?= $key->tgl_kembali?></td>
            </tr>
            <tr>
                <td>6. Peserta / Pengantar</td>
                <td>:</td>
                <td></td>
            </tr>
            <?php
                $tgl = date('d-m-Y');
                $ctr = 1;
                foreach ($anggotaPPD as $row) { ?>
            <tr>
                <td></td>
                <td>:</td>
                <td><?= $ctr?> <?= $row->nama?></td>
            </tr>       
            <?php $ctr++;   }
            ?>
            
            <tr>
                <td>7. Keterangan</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
        <hr>
        <div align="right">
            <p>
                Bandung, <?php echo $tgl?>
                <br>
                Pemberi Perintah
                <br>
                <br>
                <br>
                <br>
                <br>
                ___________________
                <br>
                Jabatan ___________


            </p>
        </div>
    </div>
</div>
</body>
</html>