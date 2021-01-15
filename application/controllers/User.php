<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps');
    }
    
    public function index() 
    {
        $data = array (
                   'title' => 'Data User Rumah Sakit',
                   'map' => $this->googlemaps->create_map(),
                   'isi' => 'user/v_lists'
        );
            $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function login()
    {
        
        $this->form_validation->set_rules('username', 'Username', required);
        $this->form_validation->set_rules('password', 'Password', required);
 
        if ($this->form_validation->run() == TRUE) {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $this->user_login->login($username,$password);

        }
        
        
        $data = array (
            'title' => 'Login',
            'map' => $this->googlemaps->create_map(),
            'isi' => 'Login'
 );
     $this->load->view('template/v_wrapper', $data, FALSE);
    }
}