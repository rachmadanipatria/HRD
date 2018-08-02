<?php

class C_karyawan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('upload');
	}

	public function editDataPersonal(){
		$nip = $this->input->post('nip');
		$namalengkap = $this->input->post('namalengkap');
		$nik = $this->input->post('nik');
		$unit = $this->input->post('unit');
		$statuskaryawan = $this->input->post('statuskaryawan');
		$tempatlahir = $this->input->post('tempatlahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jabatan = $this->input->post('jabatan');
		$nama_anak1 = $this->input->post('nama_anak1');
		$nama_anak2 = $this->input->post('nama_anak2');
		$nama_anak3 = $this->input->post('nama_anak3');
		$alamatrumah = $this->input->post('alamatrumah');
		$notlp_rumah = $this->input->post('notlp_rumah');
		$nohp = $this->input->post('nohp');
		$email = $this->input->post('email');
		$nama_ibukandung = $this->input->post('nama_ibukandung');
		$nama_bapakkandung = $this->input->post('nama_bapakkandung');
		$alamat_ortu = $this->input->post('alamat_ortu');
		$perguruan_tinggi = $this->input->post('perguruan_tinggi');
		$level = $this->input->post('level');
		$jurusan = $this->input->post('jurusan');
		$norek_gaji = $this->input->post('norek_gaji');
		$bankgaji = $this->input->post('bankgaji');
		$tgl_mulai_kerja = $this->input->post('tgl_mulai_kerja');
		$tgl_capeg = $this->input->post('tgl_capeg');
		$tgl_penglap = $this->input->post('tgl_penglap');


		$config['upload_path'] = './assets/images/foto_pas/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG|gif|GIF';
		$config['max_size']	= '100000'; //in kb
        $this->upload->initialize($config);

         if (! $this->upload->do_upload('pas_foto')) {
            echo $this->upload->display_errors();
	    } else {
	    	$dataPersonal=array(
	    			'nip' => $nip,
					'nama' => $namalengkap,
					'nik' => $nik,
					'unit' => $unit,
					'status_karyawan' => $statuskaryawan,
					'tempat_lahir' => $tempatlahir,
					'tgl_lahir' => $tanggal_lahir,
					'nama_anak1' => $nama_anak1,
					'nama_anak2' => $nama_anak2,
					'nama_anak3' => $nama_anak3,
					'alamat_rumah' => $alamatrumah,
					'notlp_rumah' => $notlp_rumah,
					'sys_jabatan_id' => $jabatan,
					'nohp' => $nohp,
					'email' => $email,
					'alamat_ortu' => $alamat_ortu,
					'perguruan_tinggi' => $perguruan_tinggi,
					'level' => $level,
					'jurusan' => $jurusan,
					'nama_ibu_kandung' => $nama_ibukandung,
					'nama_bapak_kandung' => $nama_bapakkandung,
					'norek_gaji' => $norek_gaji,
					'bank_gaji' => $bankgaji,
					'tgl_mulai_kerja' => $tgl_mulai_kerja,
					'tgl_capeg' => $tgl_capeg,
					'tgl_penglap' => $tgl_penglap,
					'status' => "Belum disetujui",
	    			'foto' => $this->upload->data('file_name')
	    		);

	    	$where = array(
	    			'nip' => $nip
	    		);

	    	$this->m_user->insert('ms_data_update_karyawan', $dataPersonal);
	    	
	    	//$result = $this->m_konsumen->update($where,$dataStatus,'rel_pemesanan');

	    	/*if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Upload bukti pembayaran berhasil!');
			} else {
				$this->session->set_flashdata('failed', 'Upload bukti pembayaran gagal!');
			}
*/
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i> Edit Data Berhasil Diajukan <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
	    	redirect('c_user/data_personal');
	    }

	}

	public function tambahPengalamanKerja(){
		$namaperusahaan = $this->input->post('namaperusahaan');
		$tgl_mulai = $this->input->post('tgl_mulai');
		$tgl_berakhir = $this->input->post('tgl_berakhir');
		$posisi = $this->input->post('posisi');
		$unit = $this->input->post('unit');
		$tglsekarang = date('Y-m-d');

		if ($tgl_berakhir > $tglsekarang || $tgl_mulai > $tglsekarang) { 

			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i>Format Tanggal Salah<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/pengalaman_kerja/1');

		} else {
			
			$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

			foreach ($data['datapersonal'] as $key) {
				$nip = $key->nip;
			}

			$dataPengalamanKerja = array(
					'nama_perusahaan' => $namaperusahaan,
					'tgl_mulai' => $tgl_mulai,
					'tgl_berakhir' => $tgl_berakhir,
					'posisi' => $posisi,
					'unit' => $unit,
					'status' => "Belum disetujui",
					'ms_karyawan_id' => $nip
				);

			$where = array(
					'ms_karyawan_id' => $nip
				);

			$result = $this->m_user->insert('rel_pengalaman_kerja', $dataPengalamanKerja);

			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Pengalaman Kerja Berhasil Diajukan <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
	    	redirect('c_user/pengalaman_kerja/1');
		}

		
	}

	public function tambahPelatihan(){
		$namapelatihan = $this->input->post('namapelatihan');
		$tahun = $this->input->post('tahun');
		$sertifikat = $this->input->post('sertifikat');
		$tglsekarang = date('Y-m-d');

		if ($tahun <= $tglsekarang ) {
			$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

			foreach ($data['datapersonal'] as $key) {
				$nip = $key->nip;
			}

			$dataPelatihan = array(
					'nama_pelatihan' => $namapelatihan,
					'tahun' => $tahun,
					'sertifikat' => $sertifikat,
					'status' => 'Belum disetujui',
					'ms_karyawan_id' => $nip
				);

			$result = $this->m_user->insert('rel_pelatihan', $dataPelatihan);

			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Pelatihan Berhasil Diajukan <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
	    	redirect('c_user/pengalaman_kerja/2');
		} else {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i>Format Tanggal Salah<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/pengalaman_kerja/2');
		}

		

	}

	public function pengajuanCuti(){
		$nip = $this->input->post('nip');
		$namakaryawan = $this->input->post('namakaryawan');
		$atasan = $this->input->post('atasan');
		$jabatan = $this->input->post('jabatan');
		$unit = $this->input->post('unit');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$lama_cuti = $this->input->post('lama_cuti');
		$jeniscuti = $this->input->post('jeniscuti');
		$sampai_tgl = date('Y-m-d', strtotime('+'.$lama_cuti.' days', strtotime($tgl_pengajuan)));
		$tgl_sekarang = date('Y-m-d');

		$dataPengajuan = array(
				'tgl_pengajuan' => $tgl_pengajuan,
				'sampai_tgl' => $sampai_tgl,
				'lama_cuti' => $lama_cuti,
				'p_ataasan1' => "Belum disetujui",
				'p_ataasan2' => "Belum disetujui",
				'ms_karyawan_id' => $nip,
				'ms_cuti_id' => $jeniscuti,
				'status' => "Proses persetujuan"
			);

		$where = array(
				'ms_karyawan_id' => $this->session->userdata('nip')
			);

		$whereJatah = array(
				'nip' => $this->session->userdata('nip')
			);

		$cekStatus = $this->m_user->cekStatusCuti($where);
		$cekJatah =  $this->m_user->getDataById('ms_jatah_cuti',$whereJatah);

		foreach ($cekStatus as $key) {
			
		}

		foreach ($cekJatah as $row) {

		}

		$jatah = 0;
		if ($jeniscuti == 1) {
			$jatah = $row->tahunan;
		} elseif ($jeniscuti == 2) {
			$jatah = $row->alasan_penting;
		} elseif ($jeniscuti == 3) {
			$jatah = $row->sakit;
		} elseif ($jeniscuti == 4) {
			$jatah = $row->melahirkan;
		} elseif ($jeniscuti == 5) {
			$jatah = $row->besar;	
		} elseif ($jeniscuti == 6) {
			$jatah = $row->keguguran;
		} elseif ($jeniscuti == 7) {
			$jatah = $row->diluar_tanggungan_yayasan;
		}

		if ($jatah < $lama_cuti) {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i>Jatah Cuti Tidak Cukup<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/manajemen_cuti');
			
		} else if ($tgl_pengajuan < $tgl_sekarang) {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i> Format tanggal salah!<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/manajemen_cuti');
			
		} else {
			if ($key->status == "Disetujui" || $key->status == "Proses persetujuan") {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i>Pengajuan cuti anda yang sebelumnya belum di ACC atau di cetak<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/manajemen_cuti');

			} else {
				$result = $this->m_user->insert('rel_manajemen_cuti', $dataPengajuan);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Pengajuan Cuti Berhasil Diajukan <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
				redirect('C_user/manajemen_cuti');

			}
		}

	}

	public function pengajuanPerjalananDinas(){
		//$nip = $this->input->post('nip');
		$deskripsi = $this->input->post('deskripsi');
		$jenis_perjalanan = $this->input->post('jenisperjalanan');
		$kota_tujuan = $this->input->post('kotatujuan');
		$transportasi = $this->input->post('transportasi');
		$anggaran_saatini = $this->input->post('anggaransaatini');
		$anggaran_akhir = $this->input->post('anggaranakhir');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$tgl_sekarang = date('Y-m-d');

		$tglpengajuan = strtotime($tgl_pengajuan);
		$tglkembali = strtotime($tgl_kembali);

		$lama_Perjalanan = $tglkembali - $tglpengajuan;
		$lamaperjalanan = floor($lama_Perjalanan / (60 * 60 * 24));

		$jml = count($_POST['nip']);

		$dataPerjalananDinas = array(
				'deskripsi_perjalanan' => $deskripsi,
				'jenis_perjalan' => $jenis_perjalanan,
				'kota_tujuan' => $kota_tujuan,
				'transportasi' => $transportasi,
				'anggaran_saat_ini' => $anggaran_saatini,
				'anggaran_akhir' => $anggaran_akhir,
				'p_atasan1' => "Belum disetujui",
				'p_atasan2' => "Belum disetujui",
				'tgl_pengajuan' => $tgl_pengajuan,
				'tgl_kembali' => $tgl_kembali,
				'lama_perjalanan' => $lamaperjalanan,
				'ms_karyawan_id' => $this->session->userdata('nip'),
				'status' => "Proses persetujuan"	
			);

		$cekStatus = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));

		foreach ($cekStatus as $key ) {
			
		}

		if ($key->status == "Disetujui" || $key->status == "Proses persetujuan") {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i>PPD anda yang sebelumnya masih belum di ACC atau belum di cetak<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/manajemen_perjalanan_dinas');

		} elseif ($tgl_pengajuan < $tgl_sekarang || $tgl_kembali < $tgl_sekarang) {
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"fa fa-check\"></i> Format tanggal salah!<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('C_user/manajemen_perjalanan_dinas');

		} else {
			$result = $this->m_user->insert('rel_manajemen_perjalanan_dinas', $dataPerjalananDinas);
			

			$dataPPD = $this->m_user->getNewPPD();

			foreach ($dataPPD as $key) {
			}

			for ($i=0; $i < $jml ; $i++) { 

				$nipanggota = $this->input->post('nip')[$i];

				$dataAnggotaPPD = array(
					'nip' => $nipanggota,
					'id_perjalanandinas' => $key->id_perjalanan_dinas
				);

				$this->m_user->insert('rel_anggota_perjalanandinas', $dataAnggotaPPD);
			}
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Pengajuan Perjalanan Dinas Berhasil Diajukan <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
		redirect('C_user/manajemen_perjalanan_dinas');
		}
	}
}

?>