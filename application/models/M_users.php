<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->table = 'users';
	}

	public function get_all_user($offset,$perpage)
	{
		//ambil semua user berdasarkan offset untuk paging

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->offset($offset);
		$this->db->limit($perpage);

		$user = $this->db->get();

		return $user->result();
	}

	public function get_jumlah_records()
	{
		//hitung jumlah semua records
		return $this->db->count_all($this->table);
	}

	public function get_user($username)
	{
		return $this->db->select('*')->from($this->table)->where('username',$username)->get()->row();
	}

	public function update_user($id,$post)
	{
		//update where id 
		$this->db->where('username',$id);
		$this->db->update($this->table,$post);
	}

	public function delete_user($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */