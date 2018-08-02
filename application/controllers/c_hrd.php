<?php

class C_hrd extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = $this->session->all_userdata();
		if (count($data) <= 1) {
			$this->load->view('v_login');
			// print_r($data);
		}else{
			$data['link'] = 'Dashboard';
			$data['dashboard'] = 'active';
			$data['data_personal'] = '';
			$data['pengalaman_kerja'] = '';
			$data['manajemencuti'] = '';
			$data['jatahcuti'] = '';
			$data['manajemenperjalanandinas'] = '';
			$data['manajemenabsensi'] = '';
			$data['sppd_online'] = '';
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
			$data['jabatan'] = $this->m_user->getData('sys_jabatan');
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('hrd/v_dashboard_hrd',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function v_pengajuan_dataPersonal(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = 'active';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['jatahcuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenabsensi'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_dataPersonal',$data);
		$this->load->view('template/footer');
		
	}

	public function v_jatah_cuti_karyawan(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['jatahcuti'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenabsensi'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataJatahCuti'] = $this->m_user->getJatahCutiKarywan();
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_jatah_cuti_karyawan',$data);
		$this->load->view('template/footer');
		
	}

	public function tambah_karyawan(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jabatan = $this->input->post('jabatan');

		$checkDataUser = $this->m_user->getData('user');
		$checkDataKaryawan = $this->m_user->getData('ms_data_karyawan');

		foreach ($checkDataUser as $row ) {
			if ($row->username == $username) {
				$this->session->set_flashdata('failed', 'Username sudah terpakai');
				redirect('c_hrd/v_pengajuan_dataPersonal');
			} else {
				foreach ($checkDataKaryawan as $x) {
					if ($x->nip == $nip) {
						$this->session->set_flashdata('failed', 'NIP sudah terpakai');
						redirect('c_hrd/v_pengajuan_dataPersonal');
					}
				}
			}
		}


		$dataUser = array(
				'username' => $username,
				'password' => $password,
				'id_tipe_user' => $jabatan
			);

		$this->m_user->insert('user', $dataUser);

		$newdata = $this->m_user->getNewData('user');

		foreach ($newdata as $key) {
		}

		$dataPersonal = array(
				'nip' => $nip,
				'nama' => $nama,
				'user_id' => $key->id_user,
				'sys_jabatan_id' => $jabatan
			);

		$this->m_user->insert('ms_data_karyawan', $dataPersonal);

		$dataCuti = array(
				'nip' => $nip,
				'tahunan' => 12,
				'alasan_penting' => 7,
				'sakit' => 3,
				'melahirkan' => 90,
				'besar' => 45,
				'keguguran' => 45,
				'diluar_tanggungan_yayasan' => 90
			);

		$result = $this->m_user->insert('ms_jatah_cuti', $dataCuti);


		if ($result == TRUE) {
			$this->session->set_flashdata('success', 'Tambah karyawan berhasil');
			redirect('c_hrd/v_pengajuan_dataPersonal');
		} else {
			$this->session->set_flashdata('failed', 'Tambah karyawan gagal');			
		}
	}

	public function v_pengajuan_cuti(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['jatahcuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenabsensi'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['dataCuti'] = $this->m_user->getDataCuti('Sudah disetujui','Sudah disetujui');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_cuti',$data);
		$this->load->view('template/footer');
	}

	public function v_pengajuan_perjalanan_dinas(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['jatahcuti'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['manajemenabsensi'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataUpdatePersonal'] = $this->m_user->getPengajuanDataPersonal();
		$data['dataPPD'] = $this->m_user->getDataPPD('Sudah disetujui','Sudah disetujui');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengajuan_perjalanan_dinas',$data);
		$this->load->view('template/footer');
	}

	public  function v_manajemen_absensi(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['jatahcuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenabsensi'] = 'active';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

		$tgl = date('Y-m-d');
		$cekAbsensi = $this->m_user->cekAbsensi($tgl);

		if (empty($cekAbsensi)) {
			$data['dataPersonal'] = $this->m_user->getData('ms_data_karyawan');
		} 
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_absensi_karyawan',$data);
		$this->load->view('template/footer');		
	}

	public function cetak_suratPPD($id_pengajuan){

		$data['dataPPD'] = $this->m_user->getDetailPPD($id_pengajuan);

		$where = array(
				'id_perjalanandinas' => $id_pengajuan
			);

		$whereStatus = array(
				'id_perjalanan_dinas' => $id_pengajuan
			);

		$dataStatus = array(
				'status' => "Expired"
			);

		$this->m_user->update($whereStatus, $dataStatus, 'rel_manajemen_perjalanan_dinas');


		$data['anggotaPPD'] = $this->m_user->getDataAnggotaPPD($where);

		$this->load->view('hrd/cetak_suratPPD',$data);

	}

	public function cetak_suratCuti($nip,$id_cuti){

		$where = array(
				'nip' => $nip
			);

		$whereStatus = array(
				'id_pengajuan_cuti' => $id_cuti
			);

		$dataStatus = array(
				'status' => "Expired"
			);

		$this->m_user->update($whereStatus, $dataStatus, 'rel_manajemen_cuti');

		$data['pengajuanCuti'] = $this->m_user->getPengajuanDataCuti($nip);
		$data['jatahCuti'] = $this->m_user->getDataById('ms_jatah_cuti', $where);

		$this->load->view('hrd/cetak_suratPengajuanCuti', $data);

		//print($data['pengajuanCuti']);
	}

	public function a_persetujuanDataPersonal(){
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$persetujuan = $this->input->post('persetujuan');

		if ($persetujuan == "Tidak disetujui") {

			$where = array(
					'id_pengajuan' => $id
				);

			$status = array(
					'status' => $persetujuan
				);

			$statusPengajuan = $this->m_user->update($where, $status, 'ms_data_update_karyawan');


		} elseif ($persetujuan == "Sudah disetujui") {

			$dataBaru = $this->m_user->getPengajuanDataPersonalById($id);

			foreach ($dataBaru as $key) {
				$dataPersonal=array(
	    			'nip' => $key->nip,
					'nama' => $key->nama,
					'nik' => $key->nik,
					'unit' => $key->unit,
					'status_karyawan' => $key->status_karyawan,
					'tempat_lahir' => $key->tempat_lahir,
					'tgl_lahir' => $key->tgl_lahir,
					'nama_anak1' => $key->nama_anak1,
					'nama_anak2' => $key->nama_anak2,
					'nama_anak3' => $key->nama_anak3,
					'alamat_rumah' => $key->alamat_rumah,
					'notlp_rumah' => $key->notlp_rumah,
					'sys_jabatan_id' => $key->sys_jabatan_id,
					'nohp' => $key->nohp,
					'email' => $key->email,
					'alamat_ortu' => $key->alamat_ortu,
					'perguruan_tinggi' => $key->perguruan_tinggi,
					'level' => $key->level,
					'jurusan' => $key->jurusan,
					'nama_ibu_kandung' => $key->nama_ibu_kandung,
					'nama_bapak_kandung' => $key->nama_bapak_kandung,
					'norek_gaji' => $key->norek_gaji,
					'bank_gaji' => $key->bank_gaji,
					'tgl_mulai_kerja' => $key->tgl_mulai_kerja,
					'tgl_capeg' => $key->tgl_capeg,
					'tgl_penglap' => $key->tgl_penglap,
	    			'foto' => $key->foto
	    		);

	    		$datacoba = array(
					'nama' => "coba"
					);
				}

				$where = array(
				 'nip' => $nip
				);

				$whereStatus = array(
					'id_pengajuan' => $id
				);

				$status = array(
					'status' => $persetujuan
				);

				$result = $this->m_user->update($where,$dataPersonal,'ms_data_karyawan');
				$statusPengajuan = $this->m_user->update($whereStatus, $status, 'ms_data_update_karyawan');

		}

		
	 	redirect('c_hrd');
		//print_r($persetujuan);
	}

	public function v_pengajuan_pengalamanKerja(){

		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = 'active';
		$data['manajemencuti'] = '';
		$data['jatahcuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['manajemenabsensi'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataPengalamanKerja'] = $this->m_user->getDataPengalmanKerja();
		$data['dataPelatihan'] = $this->m_user->getDataPelatihan();
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$this->load->view('template/header',$data);
		$this->load->view('hrd/v_pengalaman_kerja',$data);
		$this->load->view('template/footer');


	}

	public function a_persetujuanPengalamanKerja(){

		$persetujuan = $this->input->post('persetujuan');

		$id_penglamankerja = $this->input->post('idpengalamankerja');

		$where = array(
				'id_pengalamankerja' => $id_penglamankerja
			);

		$dataStatus = array(
				'status' => $persetujuan
			);

		$result = $this->m_user->update($where, $dataStatus, 'rel_pengalaman_kerja');

		redirect('c_hrd');
	}

	public function detailPengalamanKerja($id_pengajuan){

		$dataPengalamanKerja = $this->m_user->getDataPengalamanKerja($id_pengajuan);

		foreach ($dataPengalamanKerja as $key) {
			# code...
		}

		echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Pengajuan Pengalaman Kerja</h5>
			</div>

			<form method="POST" action="'.base_url().'c_hrd/a_persetujuanPengalamanKerja">	
			<div class="modal-body">					
			<div class="form-group">
			<label class="control-label col-sm-3">Nama</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->nama.'</label>
				<input type="hidden" name="idpengalamankerja" value="'.$id_pengajuan.'"></input>
			</div>
			<label class="control-label col-sm-3">Unit</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->unit.'</label>
			</div>
			<label class="control-label col-sm-3">Jabatan</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->nama_jabatan.'</label>
			</div>
			<label class="control-label col-sm-3">Nama Perusahaan</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->nama_perusahaan.'</label>
			</div>
			<label class="control-label col-sm-3">Posisi</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->posisi.'</label>
			</div>
			<label class="control-label col-sm-3">Tanggal Mulai</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->tgl_mulai.'</label>
			</div>
			<label class="control-label col-sm-3">Tanggal Berkahir</label>
			<div class="col-sm-9">
				<label class="control-label">'.$key->tgl_berakhir.'</label>
			</div>
			</div>

			<div class="modal-footer">
				<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
				<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
			</div>

			</form>

		';

	}

	public function a_persetujuanPelatihan(){

		$persetujuan = $this->input->post('persetujuan');

		$id_pelatihan = $this->input->post('idpelatihan');

		$where = array(
				'id_pelatihan' => $id_pelatihan
			);

		$dataStatus = array(
				'status' => $persetujuan
			);

		$result = $this->m_user->update($where, $dataStatus, 'rel_pelatihan');

		redirect('c_hrd');

	}

	public function detailPelatihan($id_pelatihan){

		$data_pelatihan = $this->m_user->getPengajunDataPelatihan($id_pelatihan);

		foreach ($data_pelatihan as $row ) {
			
		}

		echo '
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Horizontal form</h5>
			</div>

			<form method="POST" action="'.base_url().'c_hrd/a_persetujuanPelatihan" >
				<div class="modal-body">
					<div class="form-group">
						
						<label class="control-label col-sm-3">NIP</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nip.'</label>
							<input type="hidden" name="idpelatihan" value="'.$row->id_pelatihan.'"></input>
							<!-- <input type="hidden" name="id" value="<?= $key->id_pengajuan?>"></input>
							<input type="hidden" name="nip" value="<?= $key->nip?>"></input> -->
						</div>
						<class="form-group">
						<label class="control-label col-sm-3">Nama</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nama.'</label>
						</div>
						<label class="control-label col-sm-3">Unit</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->unit.'</label>
						</div>
						<label class="control-label col-sm-3">Jabatan</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nama_jabatan.'</label>
						</div>
						<label class="control-label col-sm-3">Nama Pelatihan</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nama_pelatihan.'</label>
						</div>
						<label class="control-label col-sm-3">Tahun Pelatihan</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->tahun.'</label>
						</div>
						<label class="control-label col-sm-3">Sertifikat</label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->sertifikat.'</label>
						</div>
						</div>
					</div>

					<div class="modal-footer">
					<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
					<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
					
					</div>
				</div>
			</form>
		';
	}

	public function editJatahCuti($id_jatah){

		$dataJatahCuti = $this->m_user->getJatahCutiKarywanById($id_jatah);

		echo json_encode($dataJatahCuti[0]);

	}

	public function fetch(){

		$result = $this->m_user->fetch()->result();
		$count = $this->m_user->fetch()->num_rows();
		$output = '';

		if($count > 0){
			$output .='
				<li>
					<a href="#">
					<strong>"test"</strong>
					<small><em>"test"</em></small>
					</a>
				</li>
			';
		}else{
			$output .='
				<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>
			';
		}

		$where = array(
				'status_seen' => 0
			);
		$result_1 = $this->m_user->getDataById('rel_pengalaman_kerja', $where);
		$count_1 = count($result_1);
		$data = array(
				'notifiication' => $output,
				'unseen_notification' => $count_1
			);
		print_r($count);
		echo json_encode($data);
	}

	public function inputAbsensi(){
		$jml = count($_POST['nip']);
		$tgl = date('Y-m-d');

		//$status = $_POST[$jml['0']];

		$data1 = array(
				'tgl_absensi' => $tgl
			);

		$result1 = $this->m_user->insert('ms_absensi',$data1);

		$cekAbsensi = $this->m_user->cekAbsensi($tgl);

		foreach ($cekAbsensi as $ca ) {
			$id_absensi = $ca->id_absensi;
		}

		for ($i=0; $i < $jml ; $i++) { 

			$nip = $_POST['nip'][$i];

			$status = $_POST[$nip];

			$data2 = array(
					'nip' => $nip,
					'status' => $status[0],
					'id_absensi' => $id_absensi
				);

			$result2 = $this->m_user->insert('rel_detail_absensi', $data2);
		}

		redirect('c_hrd/v_manajemen_absensi');
	}
}
?>
