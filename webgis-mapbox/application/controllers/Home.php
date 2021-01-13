<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('googlemaps');
        $this->load->model('m_rumkit');
        
    }
    
    public function index() 
    {
        $config['center'] = '-6.423010, 106.771597';
        $config['zoom'] = 15;
        $this->googlemaps->initialize ($config);

        $rumkit=$this->m_rumkit->lists();
        foreach ($rumkit as $key => $value) {
            $marker=array();
            $marker['position']="$value->latitude, $value->longitude";
            $marker['animation']="BOUNCE";
            $marker['infowindow_content'] ='<div class="media" style="width:250px;">';
            $marker['infowindow_content'] .='<div class="media-body">';
            $marker['infowindow_content'] .='<h4>' .$value->nama_rumkit. '</h4>';
            $marker['infowindow_content'] .='<p>' .$value->no_telfon. '</p>';
            $marker['infowindow_content'] .='<p>' .$value->alamat. '</p>';
            $marker['infowindow_content'] .='<p>' .$value->deskripsi. '</p>';
            $marker['infowindow_content'] .='</div>';
            $marker['infowindow_content'] .='</div>';
            $marker['infowindow_content'] .='</div>';
            $this->googlemaps->add_marker($marker);
        }

        $data = array (
                   'title' => 'Pemetaan Rumah Sakit',
                   'map' => $this->googlemaps->create_map(),
                   'isi' => 'v_home'
        );
            $this->load->view('template/v_wrapper', $data, FALSE);
    }
}