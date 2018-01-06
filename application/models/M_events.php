<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_events extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->table = 'events';
	}

	public function get_all_event($offset,$perpage)
	{
		//ambil semua event berdasarkan offset untuk paging

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->offset($offset);
		$this->db->limit($perpage);

		$event = $this->db->get();

		return $event->result();
	}

	public function get_jumlah_records()
	{
		//hitung jumlah semua records
		return $this->db->count_all($this->table);
	}

	public function get_event($id)
	{
		return $this->db->select('*')->from($this->table)->where('id_event',$id)->get()->row();
	}

	public function update_event($id,$post)
	{
		//update where id 
		$this->db->where('id_event',$id);
		$this->db->update($this->table,$post);
	}

	public function delete_event($id)
	{
		$this->db->where('id_event',$id);
		$this->db->delete($this->table);
	}

}

/* End of file M_event.php */
/* Location: ./application/models/M_event.php */