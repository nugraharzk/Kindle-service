<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

        $this->load->model('m_accounts');
        $this->load->model('m_users');
    }

    public function login(){
        //check jika tombol submit ditekan
        if(!$this->input->post('username')){
            $this->load->view('v_login');
        }
        else{

        //handling jika tombol submit ditekan
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $usr = $this->m_accounts->auth($username,$password);
            
            if(!$usr)
            {
                $data['nama'] = $username;
                $this->load->view('v_error', $data);
            }else{
                //set session
                $detail = $usr->row();
                $user = $this->m_users->get_user($detail->username);

                $array = array(
                    'is_logged_in' => true,
                    'username' => $user->username,
                    'pekerjaan' => $user->pekerjaan,
                    'level' => $user->jabatan,
                    'nama' => $user->nama
                );
                
                $this->session->set_userdata( $array );
                redirect('dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}

?>