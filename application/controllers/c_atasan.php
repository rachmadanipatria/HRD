<?php 

class c_atasan extends CI_Controller
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
			$data['manajemenperjalanandinas'] = '';
			$data['sppd_online'] = '';
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('atasan/v_dashboard_atasan',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function persetujuanCuti(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataCuti'] = $this->m_user->getDataCutiAtasan1("Belum disetujui");
		$data['dataCuti2'] = $this->m_user->getDataCutiAtasan2("Belum disetujui");
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_pengajuan_cuti',$data);
		$this->load->view('template/footer');
	}

	public function persetujuanPerjalananDinas(){
		$data['link'] = 'Dashboard';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['dataPerjalananDinas'] = $this->m_user->getDataPerjalananDinas('p_atasan1', "Belum disetujui");
		$data['dataPerjalananDinas2'] = $this->m_user->getDataPerjalananDinas('p_atasan2', "Belum disetujui");
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('atasan/v_pengajuan_perjalanan_dinas',$data);
		$this->load->view('template/footer');
		//print_r($data['dataPerjalananDinas2']);
	}

	public function a_persetujuanCuti(){
		$id_pengajuan_cuti = $this->input->post('id_pengajuan_cuti');
		$persetujuan = $this->input->post('persetujuan');

		$where = array(
				'id_pengajuan_cuti' => $id_pengajuan_cuti
			);

		if ($this->session->userdata('jabatan') == 1) {
			$dataPersetujuan = array(
				'p_ataasan1' => $persetujuan
			);
		} elseif ($this->session->userdata('jabatan') == 2) {
			$dataPersetujuan = array(
				'p_ataasan2' => $persetujuan
			);
		}

		$result = $this->m_user->update($where, $dataPersetujuan, 'rel_manajemen_cuti');

		
		$checkPersetujuan = $this->m_user->getDataById('rel_manajemen_cuti', $where);



		foreach ($checkPersetujuan as $key) {
		}


		if ($key->p_ataasan1 == "Sudah disetujui" && $key->p_ataasan2 == "Sudah disetujui") {
			//print_r($key->p_ataasan1);
			$jeniscuti = $key->ms_cuti_id;
			$lama_cuti = $key->lama_cuti;

			$dataStatus = array(
				'status' => "Disetujui"
			);

			$this->m_user->update($where,$dataStatus,'rel_manajemen_cuti');

			$where = array(
					'nip' => $key->ms_karyawan_id
				);	

			$checkJatah = $this->m_user->getDataById('ms_jatah_cuti', $where);

			foreach ($checkJatah as $wor) {
			}

			if ($jeniscuti == 1) {
				$jatah = $wor->tahunan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'tahunan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');
			} elseif ($jeniscuti == 2) {
				$jatah = $wor->alasan_penting - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'alasan_penting' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');
			} elseif ($jeniscuti == 3) {
				$jatah = $wor->sakit - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'sakit' => $jatah
					);
			} elseif ($jeniscuti == 4) {
				$jatah = $wor->melahirkan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'melahirkan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 5) {
				$jatah = $wor->besar - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'besar' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 6) {
				$jatah = $wor->keguguran - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id 
					);

				$jatahBaru = array(
						'keguguran' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			} elseif ($jeniscuti == 7) {
				$jatah = $wor->diluar_tanggungan_yayasan - $lama_cuti;

				$where = array(
						'nip' => $key->ms_karyawan_id  
					);

				$jatahBaru = array(
						'diluar_tanggungan_yayasan' => $jatah
					);
				$this->m_user->update($where, $jatahBaru, 'ms_jatah_cuti');

			}
		}

		$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Persetujuan Pengajuan Cuti Berhasil Dilakukan<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
		redirect('c_atasan');
	}

	public function a_persetujuanPerjalananDinas(){
		$id_pengajuan_perjalanan_dinas = $this->input->post('id_perjalanan_dinas');
		$persetujuan = $this->input->post('persetujuan');

		$where = array(
				'id_perjalanan_dinas' => $id_pengajuan_perjalanan_dinas
			);

		if ($this->session->userdata('jabatan') == 1) {
			$dataPersetujuan = array(
				'p_atasan1' => $persetujuan
			);
		}elseif ($this->session->userdata('jabatan') == 2) {
			$dataPersetujuan = array(
				'p_atasan2' => $persetujuan
			);
		}

		$result = $this->m_user->update($where, $dataPersetujuan, 'rel_manajemen_perjalanan_dinas');

		$cekStatus = $this->m_user->getDataById('rel_manajemen_perjalanan_dinas', $where);

		foreach ($cekStatus as $key) {
			
		}

		if ($key->p_atasan1 == "Sudah disetujui" && $key->p_atasan2 == "Sudah disetujui") {

			$dataStatus = array(
				'status' => "Disetujui"
			);

			$this->m_user->update($where,$dataStatus,'rel_manajemen_perjalanan_dinas');
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Persetujuan Pengajuan Perjalanan Dinas Berhasil Dilakukan<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('c_atasan/persetujuanPerjalananDinas');
			
			
		} else{
			$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"fa fa-check\"></i>Persetujuan Pengajuan Perjalanan Dinas Berhasil Dilakukan<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>");
			redirect('c_atasan/persetujuanPerjalananDinas');
		}

	}

	public function detailCuti($id_cuti){

		$dataDetail = $this->m_user->getDetailCuti($id_cuti);

		foreach ($dataDetail as $key) {
			
		}									

		echo '
			<form method="POST" action="'.base_url().'c_atasan/a_persetujuanCuti">
			<div class="modal-body">
			<div class="form-group">
				<label class="control-label col-sm-3">NIP</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nip.'</label>
					<input type="hidden" name="id_pengajuan_cuti" value="'.$key->id_pengajuan_cuti.'"></input>
				</div>
				<label class="control-label col-sm-3">Nama</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nama.'</label>
				</div>
				<label class="control-label col-sm-3">Jenis Cuti</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->nama_cuti.'</label>
				</div>
				<label class="control-label col-sm-3">Tanggal Pengajuan</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->tgl_pengajuan.'</label>
				</div>
				<label class="control-label col-sm-3">Sampai Tanggal</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->sampai_tgl.'</label>
				</div>
				<label class="control-label col-sm-3">Persetujuan atasan 1</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->p_ataasan1.'</label>
				</div>
				<label class="control-label col-sm-3">Persetujuan atasan 2</label>
				<div class="col-sm-9">
					<label class="control-label">'.$key->p_ataasan2.'</label>
				</div>
			</div>
			</div>
			<div class="modal-footer">
				<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
				<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
				
			</div>
			</form>

		';

	}

	public function detailDinas($id_dinas){

		$dataDetail = $this->m_user->getDetailPPD($id_dinas);

		foreach ($dataDetail as $key) {
			
		}									


		echo '
		<form method="POST" action="'.base_url().'c_atasan/a_persetujuanPerjalananDinas" >
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3">NIP Pengaju</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->nip.'</label>
						<input type="hidden" name="id_perjalanan_dinas" value="'. $key->id_perjalanan_dinas.'"></input>
						
					</div>
					<label class="control-label col-sm-3">Nama Pengaju</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->nama.'</label>
					</div>
					<label class="control-label col-sm-12"> <strong>Anggota PPD</strong></label> ';
					

						$where = array(
								'id_perjalanandinas' => $key->id_perjalanan_dinas
							);

						$dataAnggota =  $this->m_user->getDataAnggotaPPD($where);

						if (empty($dataAnggota)) {
		echo '			<label class="control-label col-sm-12">&nbsp&nbsp&nbsp Tidak ada anggota </label>';
						} else {

						foreach ($dataAnggota as $row) {
						
		echo '			<label class="control-label col-sm-3">&nbsp&nbsp&nbsp NIP Anggota </label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nip.'</label>
						</div>
						<label class="control-label col-sm-3">&nbsp&nbsp&nbsp Nama Anggota </label>
						<div class="col-sm-9">
							<label class="control-label">'.$row->nama.'</label>
						</div> ';

						}
						}

		echo '		<br>
					<br>	

					<label class="control-label col-sm-3">Deskripsi Perjalanan</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->deskripsi_perjalanan.'</label>
					</div>
					<label class="control-label col-sm-3">Jenis Perjalanan Dinas</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->jenis_perjalan.'</label>
					</div>
					<label class="control-label col-sm-3">Kota Tujuan</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->kota_tujuan.'</label>
					</div>
					<label class="control-label col-sm-3">Transportasi</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->transportasi.'</label>
					</div>
					<label class="control-label col-sm-3">Persetujuan atasan 1</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->p_atasan1.'</label>
					</div>
					<label class="control-label col-sm-3">Persetujuan atasan 2</label>
					<div class="col-sm-9">
						<label class="control-label">'.$key->p_atasan2.'</label>
					</div>
					
				</div>
			</div>

			<div class="modal-footer">
				<button name="persetujuan" value="Sudah disetujui" class="btn btn-success">Setujui</button>
				<button name="persetujuan" value="Tidak disetujui" class="btn btn-danger">Tidak disetujui</button>
				
			</div>
		</form>
		';

	}
}