<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_DataMaster extends CI_Model
{

	public function admin_list_all()
	{

		$this->db->select('*');
		$q = $this->db->get('tb_user')->result();
		return $q;
	}



	public function pegawai_list_all()
	{
		$q = $this->db->select('*')
			->from('tb_pegawai')
			->get();
		return $q->result();
	}



	public function get_data_admin($id)
	{
		$q = $this->db->select('*')->from('tb_user')->where('id', $id)->limit(1)->get();
		if ($q->num_rows() < 1) {
			redirect(base_url('/data_master/admin'));
		}
		return $q->row();
	}

	public function get_data_pegawai($id)
	{
		$q = $this->db->select('*')
			->from('tb_pegawai')
			->where('id', $id)
			->limit(1)
			->get();
		if ($q->num_rows() < 1) {
			redirect(base_url('/data_master/pegawai'));
		}
		return $q->row();
	}



	public function admin_update($id_user, $username, $nip, $namalengkap, $password, $type, $avatar)
	{
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else if ($type == 'vendor gedung') {
			$role = 2;
		} else {
			$role = 3;
		}

		$d_t_d = array(
			'id' => $id_user,
			'username' => $username,
			'nip' => $nip,
			'nama' => $namalengkap,
			'id_role' => $role
		);

		if (!empty($password)) {
			$d_t_d['password'] = md5($password);
		}
		if (!empty($avatar)) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id_user)->update('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data admin berhasil diubah');
	}

	public function pegawai_update(
		$id,
		$nama,
		$nip,
		$tanggal_lahir,
		$jenis_kelamin,
		$unit_kerja,
		$status_pegawai,
		$password,
		$id_user,
		$avatar
	) {
		$d_t_d = array(
			'nama' => $nama,
			'nip' => $nip,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'unit_kerja' => $unit_kerja,
			'status_pegawai' => $status_pegawai,
			'id_user' => $id_user
		);
		if (!empty($password)) {
			$d_t_d['password'] = md5($password);
		}
		if (!empty($avatar)) {
			$d_t_d['avatar'] = $avatar;
		}
		$this->db->where('id', $id)->update('tb_pegawai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Data pegawai berhasil diubah');
	}

	public function admin_delete($id)
	{
		$this->db->delete('tb_user', array('id' => $id));
	}

	public function jabatan_delete($id)
	{
		$this->db->delete('tb_jabatan', array('id_jabatan' => $id));
	}

	public function bidang_delete($id)
	{
		$this->db->delete('tb_bidang', array('id_bidang' => $id));
	}

	public function pegawai_delete($id)
	{
		$this->db->delete('tb_pegawai', array('id' => $id));
	}

	public function namaizin_delete($id)
	{
		$this->db->delete('tb_namaizin', array('id_namaizin' => $id));
	}

	public function admin_add_new(
		$username,
		$nip,
		$namalengkap,
		$password,
		$type,
		$avatar = 0
	) {
		$role = 0;
		if ($type == 'admin') {
			$role = 1;
		} else {
			$role = 2;
		}
		$d_t_d = array(
			'username' => $username,
			'nip' => $nip,
			'nama' => $namalengkap,
			'password' => md5($password),
			'id_role' => $role,
			'avatar' => $avatar
		);
		if (empty($avatar)) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_user', $d_t_d);
		$this->session->set_flashdata('msg_alert', $type . ' baru berhasil ditambahkan');
	}

	public function jabatan_add_new(
		$nama_jabatan
	) {
		$d_t_d = array(
			'nama_jabatan' => $nama_jabatan
		);
		$this->db->insert('tb_jabatan', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Jabatan baru berhasil ditambahkan');
	}

	public function bidang_add_new(
		$nama_bidang
	) {
		$d_t_d = array(
			'nama_bidang' => $nama_bidang
		);
		$this->db->insert('tb_bidang', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Bidang baru berhasil ditambahkan');
	}

	public function namaizin_add_new(
		$type,
		$nama_izin
	) {
		$d_t_d = array(
			'type' => $type,
			'nama_izin' => $nama_izin
		);
		$this->db->insert('tb_namaizin', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Nama izin baru berhasil ditambahkan');
	}

	public function pegawai_add_new(
		$nama,
		$nip,
		$tanggal_lahir,
		$jenis_kelamin,
		$unit_kerja,
		$status_pegawai,
		$password,
		$id_user,
		$avatar = 0
	) {
		$d_t_d = array(
			'nama' => $nama,
			'nip' => $nip,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'unit_kerja' => $unit_kerja,
			'status_pegawai' => $status_pegawai,
			'password' => md5($password),
			'id_user' => $id_user,
			'avatar' => $avatar
		);
		if (empty($avatar)) {
			$d_t_d['avatar'] = 'avatar.png';
		}
		$this->db->insert('tb_pegawai', $d_t_d);
		$this->session->set_flashdata('msg_alert', 'Pegawai baru berhasil ditambahkan');
	}

	function getDataDetail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('tb_pegawai');
		return $query->row();
	}
}

/* End of file M_DataMaster.php */
/* Location: ./application/models/M_DataMaster.php */