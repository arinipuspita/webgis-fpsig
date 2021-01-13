<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_rumkit extends CI_Model {
    public function lists() 
    {
        $this->db->select('*');
        $this->db->from('tbl_rumkit');
        $this->db->order_by('id_rumkit', 'desc');
        return $this->db->get()->result();
    }
    public function input($data)
    {
        $this->db->insert('tbl_rumkit', $data);   
    }

    public function detail($id_rumkit)
    {
        $this->db->select('*');
        $this->db->from('tbl_rumkit');
        $this->db->where('id_rumkit', $id_rumkit);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_rumkit', $data['id_rumkit']);
        $this->db->update('tbl_rumkit, $data');
    }

    public function delete($data)
    {
        $this->db->where('id_rumkit', $data['id_rumkit']);
        $this->db->delete('tbl_rumkit, $data');
    }    
}
