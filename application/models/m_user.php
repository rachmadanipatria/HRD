<?php 

class M_user extends CI_Model{

	public function cek_login($username,$password){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('sys_jabatan b', 'a.id_tipe_user = b.id_jabatan');
		$this->db->join('ms_data_karyawan c', 'a.id_user = c.user_id');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get()->result();
	}

	public function getHistoryCuti($nip){
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b','a.ms_cuti_id = b.id_cuti');
		$this->db->where('ms_karyawan_id',$nip);
		return $this->db->get()->result();
	}

	public function getHistoryPerjalananDinas($nip){
		$this->db->from('rel_manajemen_perjalanan_dinas');
		$this->db->where('ms_karyawan_id',$nip);
		return $this->db->get()->result();
	}

	public function getData($table){
		$this->db->select('*');
		$this->db->from($table);

		return $this->db->get()->result();
	}

	public function getDataById($table, $where){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get()->result();
	}

	public function cekAbsensi($tgl_absensi){
		$this->db->from('ms_absensi');
		$this->db->where('tgl_absensi', $tgl_absensi);

		return $this->db->get()->result();	
	}

	public function getDataPersonal($id){
		$this->db->select('*');
		$this->db->from('user a');
		$this->db->join('ms_data_karyawan b', 'a.id_user = b.user_id');
		$this->db->join('sys_jabatan c', ' b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('id_user', $id);

		return $this->db->get()->result();
	}

	public function getPengajuanDataPersonal(){
		$this->db->select('*');
		$this->db->from('ms_data_update_karyawan a');
		$this->db->join('sys_jabatan b', 'a.sys_jabatan_id = b.id_jabatan');

		return $this->db->get()->result();
	}

	public function getPengajuanDataPersonalById($id){
		$this->db->select('*');
		$this->db->from('ms_data_update_karyawan a');
		$this->db->join('sys_jabatan b', 'a.sys_jabatan_id = b.id_jabatan');
		$this->db->where('id_pengajuan', $id);

		return $this->db->get()->result();
	}

	public function getDataPengalmanKerja(){
		$this->db->select('*');
		$this->db->from('rel_pengalaman_kerja a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
	
		return $this->db->get()->result();
	}

	public function getDataPelatihan(){
		$this->db->select('*');
		$this->db->from('rel_pelatihan a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
	
		return $this->db->get()->result();
	}

	public function getDataCutiAtasan1($status){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan1', $status);

		return $this->db->get()->result();
	}

	public function getDataCutiAtasan2($status){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan2', $status);

		return $this->db->get()->result();
	}

	public function getDataCuti($atasan1, $atasan2){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_cuti b', 'a.ms_cuti_id = b.id_cuti');
		$this->db->join('ms_data_karyawan c', 'a.ms_karyawan_id = c.nip');
		$this->db->where('p_ataasan1', $atasan1);
		$this->db->where('p_ataasan2', $atasan2);

		return $this->db->get()->result();
	}

	public function getDataPPD($atasan1, $atasan2){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->where('p_atasan1', $atasan1);
		$this->db->where('p_atasan2', $atasan2);

		return $this->db->get()->result();
	}

	public function getDataPerjalananDinas($atasan, $persetujuan){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->where($atasan,$persetujuan);

		return $this->db->get()->result();
	}

	public function getJatahCutiKarywan(){
		$this->db->select('*');
		$this->db->from('ms_jatah_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.nip');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');

		return $this->db->get()->result();

	}

	public function getJatahCutiKarywanById($id_jatah){
		$this->db->select('*');
		$this->db->from('ms_jatah_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.nip');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('a.id_jatah_cuti',$id_jatah);

		return $this->db->get()->result();

	}

	public function getPengajuanDataCuti($nip){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.ms_karyawan_id');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->join('ms_cuti d', 'a.ms_cuti_id = d.id_cuti');
		$this->db->where('b.nip',$nip);

		return $this->db->get()->result();
	}

	public function getDataPengalamanKerja($id_pengalamankerja){
		$this->db->select('*');
		$this->db->from('rel_pengalaman_kerja a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('a.id_pengalamankerja', $id_pengalamankerja);

		return $this->db->get()->result();
	}

	public function getPengajunDataPelatihan($id_pelatihan){
		$this->db->select('*');
		$this->db->from('rel_pelatihan a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('a.id_pelatihan', $id_pelatihan);

		return $this->db->get()->result();

	}

	public function update($where,$data,$table){
		 $this->db->where($where);
    	 $this->db->update($table,$data);

    	 return TRUE;
	}

	public function insert($table,$data){
		$query = $this->db->insert($table, $data);
		return $query;
	}

	public function fetch(){
		$this->db->select('*');
		$this->db->from('rel_pengalaman_kerja');
		$this->db->order_by('id_pengalamankerja', 'DESC');
		$this->db->limit('id_pengalamankerja', 4);

		return $this->db->get();

	}

	public function getNewData($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id_user','DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();
	}

	public function cekStatusCuti($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti');
		$this->db->where($where);
		$this->db->order_by('id_pengajuan_cuti', 'DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();

	}

	public function getNewPPD(){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas');
		$this->db->order_by('id_perjalanan_dinas', 'DESC');
		$this->db->LIMIT('1');

		return $this->db->get()->result();

	}

	public function getDataAnggotaPPD($where){
		$this->db->select('*');
		$this->db->from('rel_anggota_perjalanandinas a');
		$this->db->join('ms_data_karyawan b','a.nip = b.nip');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->where($where);

		return $this->db->get()->result();
	}

	public function getDetailCuti($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_cuti a');
		$this->db->join('ms_data_karyawan b','b.nip = a.ms_karyawan_id');
		$this->db->join('sys_jabatan c','b.sys_jabatan_id = c.id_jabatan');
		$this->db->join('ms_cuti d', 'a.ms_cuti_id = d.id_cuti');
		$this->db->where('a.id_pengajuan_cuti',$where);

		return $this->db->get()->result();

	}

	public function getDetailPPD($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas a');
		$this->db->join('ms_data_karyawan b', 'a.ms_karyawan_id = b.nip');
		$this->db->join('sys_jabatan c', 'b.sys_jabatan_id = c.id_jabatan');
		$this->db->where('id_perjalanan_dinas', $where);

		return $this->db->get()->result();

	}

	public function getNewPPDAnggota($where){
		$this->db->select('*');
		$this->db->from('rel_manajemen_perjalanan_dinas');
		$this->db->where('ms_karyawan_id', $where);
		$this->db->order_by('id_perjalanan_dinas', 'ASC');
		$this->db->LIMIT('1');
		
		
		return $this->db->get()->result();

	}


}

?>