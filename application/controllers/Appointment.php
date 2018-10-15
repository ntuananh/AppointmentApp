<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends CI_Controller {

    public function index() {
        $this->load->view('list');
    }

    public function listAppt() {
        $appointments = $this->appointment->get_appointment();
        echo json_encode($appointments);
    }

    public function add() {
        if ($this->input->post('date') && $this->input->post('time')) {
            $phptime = date_create_from_format('m/d/Y h:i a e', $this->input->post('date') . ' ' . $this->input->post('time') . ' UTC');
            $data['time'] = $phptime->format('Y-m-d H:i:s');
            $data['description'] = $this->input->post('desc');
            $this->appointment->new_appointment($data);
            
        } else {
            // Validation in server, simple demotration
            $this->session->set_flashdata('error', 'Something is wrong.');
        }
        redirect('/appointment');
    }

    public function search() {
        if ($this->input->post('keyword')) {
            $keyword = $this->input->post('keyword');
            $appointments = $this->appointment->get_appointment($keyword);
        } else {
            $appointments = $this->appointment->get_appointment();
        }
        echo json_encode($appointments);
    }

}
