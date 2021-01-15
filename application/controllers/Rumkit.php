<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rumkit extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->library('googlemaps');
    $this->load->model('m_rumkit');
    
}

    public function index() 
    {
        $data = array (
                   'title' => 'Data Rumah Sakit',
                   'map' => $this->googlemaps->create_map(),
                   'rumkit' =>$this->m_rumkit->lists(),
                   'isi' => 'rumkit/v_lists'
        );
            $this->load->view('template/v_wrapper', $data, FALSE);
    }

    public function input()
    {
        $config['center'] = '-6.423010, 106.771597';
        $config['zoom'] = 15;
        $this->googlemaps->initialize ($config);
        
        $marker['position']='-6.423010, 106.771597';
        $marker['draggable']=true;
        $marker['ondragend']='setToForm(event.latLng.lat(), event.latLng.lng())';
        $this->googlemaps->add_marker($marker);

        $this->form_validation->set_rules('nama_rumkit', 'Nama Rumah Sakit', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telfon', 'No Telfon', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() ==FALSE) {
            $data = array (
                'title' => 'Input Data Rumah Sakit',
                'map' => $this->googlemaps->create_map(),
                'isi' => 'rumkit/v_add'
         );
         $this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                            'nama_rumkit' => $this->input->post('nama_rumkit'),
                            'no_telfon' => $this->input->post('no_telfon'),
                            'alamat' => $this->input->post('alamat'),
                            'latitude' => $this->input->post('latitude'),
                            'longitude' => $this->input->post('longitude'),
                            'deskripsi' => $this->input->post('deskripsi')
            );
            $this->m_rumkit->input($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('rumkit');
        }
    }

    public function edit($id_rumkit)
    {
        $config['center'] = '-6.423010, 106.771597';
        $config['zoom'] = 15;
        $this->googlemaps->initialize ($config);
        
        $marker['position']='-6.423010, 106.771597';
        $marker['draggable']=true;
        $marker['ondragend']='setToForm(event.latLng.lat(), event.latLng.lng())';
        $this->googlemaps->add_marker($marker);

        $this->form_validation->set_rules('nama_rumkit', 'Nama Rumah Sakit', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telfon', 'No Telfon', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if($this->form_validation->run() ==FALSE) {
            $data = array (
                'title' => 'Edit Data Rumah Sakit',
                'map' => $this->googlemaps->create_map(),
                'rumkit'=> $this->m_rumkit->detail($id_rumkit),
                'isi' => 'rumkit/v_edit'
         );
         $this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $data = array(
                            'id_rumkit' => $id_rumkit,
                            'nama_rumkit' => $this->input->post('nama_rumkit'),
                            'no_telfon' => $this->input->post('no_telfon'),
                            'alamat' => $this->input->post('alamat'),
                            'latitude' => $this->input->post('latitude'),
                            'longitude' => $this->input->post('longitude'),
                            'deskripsi' => $this->input->post('deskripsi')
            );
            $this->m_rumkit->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit');
            redirect('rumkit');
        }
    }
    public function delete($id_rumkit)
    {
        $data = array('id_rumkit' => $id_rumkit);
        $this->m_rumkit->delete($data);
        $this->m_rumkit->set_flashdata('pesan', 'Data Berhasil Dihapus');
        redirect('rumkit');
    }
}