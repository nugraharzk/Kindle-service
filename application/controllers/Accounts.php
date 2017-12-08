<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Accounts extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data mahasiswa
<<<<<<< HEAD
    function index_get() {
        $username = $this->get('username');
        if ($username == '') {
            $users = $this->db->get('accounts')->result();
        } else {
            $this->db->where('username', $username);
            $users = $this->db->get('accounts')->result();
        }
=======
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
>>>>>>> 355a4db691049aadd0f99eb18364d78d6a1298b8
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
<<<<<<< HEAD
                    'username'      => $this->put('username'),
=======
>>>>>>> 355a4db691049aadd0f99eb18364d78d6a1298b8
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
<<<<<<< HEAD
 
=======
>>>>>>> 355a4db691049aadd0f99eb18364d78d6a1298b8
}