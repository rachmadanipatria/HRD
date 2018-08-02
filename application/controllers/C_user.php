<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

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
			$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));


			$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			$this->load->view('v_dashboard',$data);
			$this->load->view('template/footer');
		}
		
	}

	public function data_personal(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = 'active';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['jabatan'] = $this->m_user->getData('sys_jabatan');
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$this->load->view('template/header',$data);
		$this->load->view('v_form_data_personal',$data);
		$this->load->view('template/footer');

	}

	public function pengalaman_kerja($angka){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = 'active';
		$data['manajemencuti'] = '';
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['info_user'] = $this->session->all_userdata();
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));

		foreach ($data['datapersonal'] as $key) {
			$nip = $key->nip;
		}


		$where = array(
				'ms_karyawan_id' => $nip
			);

		$data['pengalamankerja'] = $this->m_user->getDataById('rel_pengalaman_kerja', $where);
		$data['pelatihan'] = $this->m_user->getDataById('rel_pelatihan', $where);
		$this->load->view('template/header',$data);

		if ($angka == 0) {
			$this->load->view('v_pengalaman_kerja',$data);
		} elseif ($angka == 1) {
			$this->load->view('v_form_pengalamankerja',$data);
		} else {
			$this->load->view('v_form_pelatihan',$data);
		}

		$this->load->view('template/footer');

	}

	public function manajemen_cuti(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = 'active';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

		$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['jeniscuti'] = $this->m_user->getData('ms_cuti');

		$where = array(
				'ms_karyawan_id' => $this->session->userdata('nip')
			);

		$data['pengajuanCuti'] = $this->m_user->cekStatusCuti($where);
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('v_manajamen_cuti',$data);
		$this->load->view('template/footer');
	}

	public function manajemen_perjalanan_dinas(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = 'active';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
		$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $this->session->userdata('nip')
				);

		$data['cuti'] = $this->m_user->cekStatusCuti($where);
		$data['info_user'] = $this->session->all_userdata();
		$this->load->view('template/header',$data);
		$this->load->view('v_manajemen_perjalanan_dinas',$data);
		$this->load->view('template/footer');
		//print_r($data['newPPD']);
	}



	public function getJenisCuti(){
	$id_cuti = $_GET['id_cuti'];
	$nip = $_GET['nip'];

	$where = array(
			'id_cuti' => $id_cuti
		);

	$wherecuti = array(
			'nip' => $nip
		);

	$lamaHari = $this->m_user->getDataById('ms_cuti',$where);
	$sisaCuti = $this->m_user->getDataById('ms_jatah_cuti',$wherecuti);

	foreach ($lamaHari as $key) {
	}

	foreach ($sisaCuti as $sc) {
		if ($id_cuti == 1) {
			$sisaJatah = $sc->tahunan;
		} elseif ($id_cuti == 2) {
			$sisaJatah = $sc->alasan_penting;
		} elseif ($id_cuti == 3) {
			$sisaJatah = $sc->sakit;
		} elseif ($id_cuti == 4) {
			$sisaJatah = $sc->melahirkan;
		} elseif ($id_cuti == 5) {
			$sisaJatah = $sc->besar;
		} elseif ($id_cuti == 6) {
			$sisaJatah = $sc->keguguran;
		} elseif ($id_cuti == 7) {
			$sisaJatah = $sc->diluar_tanggungan_yayasan;
		}
	}

	

	if ($key->id_cuti == 4) {
		
		$hari = $key->hari;

		echo '
			<div class="form-group">
				<label class="control-label col-lg-3">Sisa Cuti<span class="text-danger"></span></label>
				<div class="col-lg-9">
					<input name="lama_cuti" class="input form-control" value="'.$sisaJatah.'" readOnly></input>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">Lama Cuti<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<input name="lama_cuti" class="input form-control" value="30" readOnly></input>
				</div>
			</div>
			
		';

	}else {

		$hari = $key->hari;
	
		echo '
			<div class="form-group">
				<label class="control-label col-lg-3">Sisa Cuti<span class="text-danger"></span></label>
				<div class="col-lg-9">
					<input name="lama_cuti" class="input form-control" value="'.$sisaJatah.'" readOnly></input>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3">Lama Cuti<span class="text-danger">*</span></label>
				<div class="col-lg-9">
					<select class="input form-control" name="lama_cuti" required >';
					for ($i=1; $i <= $hari ; $i++) {
		echo '				<option value="'.$i.'">'.$i.'</option> ';
					}
		echo'		</select>
				</div>
			</div>
			
		';
	}

	}

	public function history_cuti(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['cuti'] = $this->m_user->getHistoryCuti($this->session->userdata('nip'));
		$this->load->view('template/header',$data);
		$this->load->view('v_history_cuti',$data);
		$this->load->view('template/footer');
		//print_r($data['cuti']);
	}

	public function history_perjalanan_dinas(){
		$data['link'] = 'job_profile';
		$data['dashboard'] = '';
		$data['data_personal'] = '';
		$data['pengalaman_kerja'] = '';
		$data['manajemencuti'] = '';
		$data['manajemenperjalanandinas'] = '';
		$data['sppd_online'] = '';
		$data['komp_dev'] = '';
		$data['datapersonal'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['info_user'] = $this->session->all_userdata();
		$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
		$data['perjalanandinas'] = $this->m_user->getHistoryPerjalananDinas($this->session->userdata('nip'));
		$this->load->view('template/header',$data);
		$this->load->view('v_history_perjalanan_dinas',$data);
		$this->load->view('template/footer');
		//print_r($data['cuti']);
	}

}