<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Users extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data mahasiswa
    function index_get() {
        $username = $this->get('username');
        if ($username == '') {
            $users = $this->db->get('users')->result();
        } else {
            $this->db->where('username', $username);
            $users = $this->db->get('users')->result();
        }
        $this->response($users, 200);
    }
 
    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'username'      => $this->post('username'),
                    'nama'          => $this->post('nama'),
                    'ttl'           => $this->post('ttl'),
                    'alamat'        => $this->post('alamat'),
                    'rt'            => $this->post('rt'),
                    'telepon'       => $this->post('telepon'),
                    'lat'           => $this->post('lat'),
                    'lng'           => $this->post('lng'),
                    'jabatan'       => $this->post('jabatan'));
        $insert = $this->db->insert('users', $data);
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
                    'nama'          => $this->put('nama'),
                    'ttl'           => $this->put('ttl'),
                    'alamat'        => $this->put('alamat'),
                    'rt'            => $this->put('rt'),
                    'telepon'       => $this->put('telepon'),
                    'lat'           => $this->put('lat'),
                    'lng'           => $this->put('lng'),
                    'jabatan'       => $this->put('jabatan'));
        $this->db->where('username', $username);
        $update = $this->db->update('users', $data);
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
        $delete = $this->db->delete('users');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Users extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data mahasiswa
    function index_get() {
        $username = $this->get('username');
        if ($username == '') {
            $users = $this->db->get('users')->result();
        } else {
            $this->db->where('username', $username);
            $users = $this->db->get('users')->result();
        }
        $this->response($users, 200);
    }
 
    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'username'      => $this->post('username'),
                    'nama'          => $this->post('nama'),
                    'ttl'           => $this->post('ttl'),
                    'alamat'        => $this->post('alamat'),
                    'rt'            => $this->post('rt'),
                    'telepon'       => $this->post('telepon'),
                    'lat'           => $this->post('lat'),
                    'lng'           => $this->post('lng'),
                    'jabatan'       => $this->post('jabatan'));
        $insert = $this->db->insert('users', $data);
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
                    'nama'          => $this->put('nama'),
                    'ttl'           => $this->put('ttl'),
                    'alamat'        => $this->put('alamat'),
                    'rt'            => $this->put('rt'),
                    'telepon'       => $this->put('telepon'),
                    'lat'           => $this->put('lat'),
                    'lng'           => $this->put('lng'),
                    'jabatan'       => $this->put('jabatan'));
        $this->db->where('username', $username);
        $update = $this->db->update('users', $data);
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
        $delete = $this->db->delete('users');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}
