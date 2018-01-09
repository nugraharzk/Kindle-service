<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//check login
		is_logged_in();
		//load model
		$this->load->library('pagination');
        $this->load->model('m_accounts');
        $this->load->model('m_users');
	}

	// List all your items
	public function page()
	{
		$this->index();
	}

	public function index( $offset = 0 )
	{
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('warga/page');
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
		$dat['warga'] = $this->m_accounts->get_all_account($offset,$config['per_page']);

		$data['page_title'] = 'Warga';
		$data['page_desc'] = 'Daftar Warga Tetap';
		$data['page'] = $this->load->view('warga/v_index', $dat, true);
		$this->load->view('v_base',$data);
	}

	public function detail( $username )
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
		$dat['warga'] = $this->m_users->get_user($username);

		$data['page_title'] = 'Warga';
		$data['page_desc'] = 'Daftar Warga Tetap';
		$data['page'] = $this->load->view('warga/v_detail', $dat, true);
		$this->load->view('v_base',$data);
	}

	public function acc($username)
	{
		$arr = array("verified"=>1);
		$this->m_accounts->update_account($username,$arr);
		redirect('warga');
	}

	public function edit($username)
	{
		$data['page_title'] = 'Edit Warga';
		$data['page_desc'] = 'Perubahan Data Warga Tetap';
		$dat['warga'] = $this->m_users->get_user($username);

		$data['page'] = $this->load->view('warga/v_edit', $dat, true);
		$this->load->view('v_base',$data);
		
	}

	public function upload_home($username)
	{
		$type="house";
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		    $new_image_name = $username."_".$type;
		    $config['upload_path'] = 'uploads/'.$type.'/'; 
		    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		    $config['file_name'] = $new_image_name;
		    $config['max_size']  = '0';
		    $config['max_width']  = '0';
		    $config['max_height']  = '0';
		    $config['$min_width'] = '0';
		    $config['min_height'] = '0';
		    $config['overwrite'] = true;

		    $this->load->library('upload', $config);
		    if ( ! $this->upload->do_upload('foto_rumah'))
            {
                $file = $this->upload->display_errors();
            }
            else
            {
                 $file = $this->upload->data();
            }
            // var_dump($file);
			// $data['file'] = $file['file_name'];
            $arr['house_image'] = $file['file_name'];
			$this->m_users->update_user($username,$arr);
			// $this->AdminModel->uploadingFile($data);
			redirect(site_url('warga/edit/'.$username));
		}
	}

	public function upload_profile($username)
	{
		$type="profile";
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
		    $new_image_name = $username."_".$type;
		    $config['upload_path'] = 'uploads/'.$type.'/'; 
		    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		    $config['file_name'] = $new_image_name;
		    $config['max_size']  = '0';
		    $config['max_width']  = '0';
		    $config['max_height']  = '0';
		    $config['$min_width'] = '0';
		    $config['min_height'] = '0';
		    $config['overwrite'] = true;

		    $this->load->library('upload', $config);
		    if ( ! $this->upload->do_upload('foto_profil'))
            {
                $file = $this->upload->display_errors();
            }
            else
            {
                 $file = $this->upload->data();
            }
            // var_dump($file);
			// $data['file'] = $file['file_name'];
            $arr['profile_image'] = $file['file_name'];
			$this->m_users->update_user($username,$arr);
			// $this->AdminModel->uploadingFile($data);
			redirect(site_url('warga/edit/'.$username));
		}
	}
}

/* End of file asset.php */
/* Location: ./application/controllers/asset.php */
