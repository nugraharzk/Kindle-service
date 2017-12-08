<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Status extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    public function index_get()
    {
    	$username = $this->get('username');
        if ($username == '') {
            $users = $this->db->get('status')->result();
        } else {
            $this->db->where('username', $username);
            $users = $this->db->get('status')->result();
        }
        $this->response($users, 200);
    }

    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'username'      => $this->post('username'),
                    'status'          => $this->post('status'),
                    'waktu'       => $this->post('waktu'),
                    'liked'			=> $this->post('liked'));
        $insert = $this->db->insert('status', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data mahasiswa
    function index_put() {
        $username = $this->put('username');
        $data = array(
                    'status'          => $this->put('status'),
                    'waktu'       => $this->put('waktu'),
                    'liked'			=> $this->put('liked'));
        $this->db->where('username', $username);
        $update = $this->db->update('status', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete mahasiswa
    function index_delete() {
        $username = $this->delete('username');
        $this->db->where('username', $username);
        $delete = $this->db->delete('status');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}