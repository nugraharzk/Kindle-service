<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Accounts extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data mahasiswa
    //login dengan menggunakan uri queri
    //example mobprog.com/accounts?username=achmad@gmail.com&password=achmad
    //i think its a better approach for login
    function index_get() {
        $username = $this->get('username');
        $password = $this->get('password');
        // if ($username == '') {
        //     $users = $this->db->get('accounts')->result();
        // } else {
            $this->db->where('username', $username)->or_where('email', $username);
            $this->db->where('password', $password);
            // $data=$users-result();
            $users = $this->db->get('accounts')->result();
        // }
        $this->response($users, 200);
    }
 
    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'username'      => $this->post('username'),
                    'password'          => $this->post('password'),
                    'email'       => $this->post('email'));
        $insert = $this->db->insert('accounts', $data);
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
                    'username'      => $this->put('username'),
                    'password'          => $this->put('password'),
                    'email'       => $this->put('email'));
        $this->db->where('username', $username);
        $update = $this->db->update('accounts', $data);
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
        $delete = $this->db->delete('accounts');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}