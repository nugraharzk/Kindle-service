<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class Event extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    public function index_get()
    {
        $id = $this->get('id_event');
        if ($id == '') {
            $users = $this->db->get('events')->result();
        } else {
            $this->db->where('id_event', $id);
            $users = $this->db->get('events')->result();
        }
        $this->response($users, 200);
    }

    // insert new data to mahasiswa
    function index_post() {
        $data = array(
                    'judul'          => $this->post('judul'),
                    'username'      => $this->post('username'),
                    'waktu'       => $this->post('waktu'),
                    'priority'          => $this ->post('priority'),
                    'deskripsi'          => $this ->post('deskripsi'),
                    'lat'          => $this ->post('lat'),
                    'lng'          => $this ->post('lng'),
                    'konfirmasi'          => $this ->post('konfirmasi'));
        $insert = $this->db->insert('events', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data mahasiswa
    function index_put() {
        $id = $this->put('id_event');
        $data = array(
                    'judul'          => $this->put('judul'),
                    'username'      => $this->put('username'),
                    'waktu'       => $this->put('waktu'),
                    'priority'          => $this ->put('priority'),
                    'deskripsi'          => $this ->put('deskripsi'),
                    'lat'          => $this ->put('lat'),
                    'lng'          => $this ->put('lng'),
                    'konfirmasi'          => $this ->put('konfirmasi'));
        $this->db->where('id_event', $id);
        $update = $this->db->update('events', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete mahasiswa
    function index_delete() {
        $id = $this->delete('id_event');
        $this->db->where('id', $id);
        $delete = $this->db->delete('events');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}