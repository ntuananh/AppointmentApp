<?php

Class Appointment_model extends CI_Model {

    Public function __construct() {
        parent::__construct();
    }

    public function get_appointment($keyword = '') {

        if ($keyword != '') {
            $this->db->like('description', $keyword);
        }
        $query = $this->db->get('appointment');
        return $query->result();
    }

    public function new_appointment($data) {
        $this->db->insert('appointment', $data);
    }

}
