<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_accounts extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->table = 'accounts';
	}

	public function auth($username,$password)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		$usr = $this->db->get();

		if($usr->num_rows() > 0)
		{
			return $usr;
		}else
		{
			return false;
		}
	}

	public function get_jumlah_records()
	{
		//hitung jumlah semua records
		return $this->db->count_all($this->table);
	}

	public function get_all_account()
	{
		//ambil semua account berdasarkan offset untuk paging

		$this->db->select('*');
		$this->db->from($this->table);

		$user = $this->db->get();

		return $user->result();
	}

	public function get_account($username)
	{
		return $this->db->select('*')->from($this->table)->where('username',$username)->row();
	}

	public function update_account($id,$post)
	{
		//update where id 
		$this->db->where('username',$id);
		$this->db->update($this->table,$post);
	}

	public function delete_account($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}

}

/* End of file M_account.php */
/* Location: ./application/models/M_account.php */