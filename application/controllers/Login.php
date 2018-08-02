<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		
		$this->load->view('v_login');
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data['cek'] = $this->m_user->cek_login($username,$password);
		$cek = count($data['cek']);
		if ($cek == 1) {

			foreach ($data['cek'] as $key) {
				$id = $key->id_user;
				$jabatan = $key->id_jabatan;
				$nip = $key->nip;
			}

			$data_session = array(
				'id' => $id,
				'jabatan' => $jabatan,
				'nip' => $nip,
				'username'  => $username,
                'password'  => $password,
                'logged_in' => TRUE
                );
			$this->session->set_userdata($data_session);
			$data['link'] = 'Dashboard';
			$data['dashboard'] = 'active';
			$data['data_personal'] = '';
			$data['pengalaman_kerja'] = '';
			$data['manajemencuti'] = '';
			$data['jatahcuti'] = '';
			$data['manajemenabsensi'] = '';
			$data['manajemenperjalanandinas'] = '';
			$data['sppd_online'] = '';
			$data['cek'] = $this->m_user->getDataPersonal($this->session->userdata('id'));
			$data['newPPD'] = $this->m_user->getNewPPDAnggota($this->session->userdata('nip'));
			$whereKaryawan = array(
					'nip' =>$this->session->userdata('nip')
				);

			$data['karyawan'] = $this->m_user->getDataById('ms_data_karyawan', $whereKaryawan);

			$where = array(
					'ms_karyawan_id' => $nip
				);

			$data['cuti'] = $this->m_user->cekStatusCuti($where);
			$data['komp_dev'] = '';
			$data['info_user'] = $this->session->all_userdata();
			$this->load->view('template/header',$data);
			if ($jabatan == 1 || $jabatan == 2) {
				$this->load->view('atasan/v_dashboard_atasan',$data);	
			} elseif ($jabatan == 3) {
				$this->load->view('hrd/v_dashboard_hrd',$data);
			} elseif ($jabatan == 4) {
				$this->load->view('v_dashboard',$data);
			}
			$this->load->view('template/footer');

		}else{
			echo 'data kosong';
			redirect();	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}
}
