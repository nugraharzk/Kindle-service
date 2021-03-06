<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acara extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//check login
		is_logged_in();
		//load model
		$this->load->library('pagination');
        $this->load->model('m_accounts');
        $this->load->model('m_users');
        $this->load->model('m_events');
	}

	// List all your items
	public function page()
	{
		$this->index();
	}

	public function index( $offset = 0 )
	{
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('acara/page');
		$config['total_rows'] = $this->m_events->get_jumlah_records();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$offset = $this->uri->segment(3);
		
		$this->pagination->initialize($config);

		$dat['paging'] = $this->pagination->create_links();

		//ambil data warga
		$dat['acara'] = $this->m_events->get_all_event($offset,$config['per_page']);

		$data['page_title'] = 'Acara';
		$data['page_desc'] = 'Daftar Acara Warga';
		$data['page'] = $this->load->view('acara/v_index', $dat, true);
		$this->load->view('v_base',$data);
	}

	public function detail( $id, $username )
	{
		$this->load->library('pagination');
		
		// $config['base_url'] = site_url('warga/page');
		$config['total_rows'] = $this->m_users->get_jumlah_records();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$offset = $this->uri->segment(3);
		
		$this->pagination->initialize($config);

		$dat['paging'] = $this->pagination->create_links();

		//ambil data warga
		$dat['acara'] = $this->m_events->get_event($id);
		$dat['user'] = $this->m_users->get_user($username);

		$data['page_title'] = 'Acara';
		$data['page_desc'] = 'Daftar Acara Warga';
		$data['page'] = $this->load->view('acara/v_detail', $dat, true);
		$this->load->view('v_base',$data);
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */
