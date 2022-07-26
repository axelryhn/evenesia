<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Profile extends CI_Model
{

    function getData()
    {
        $query = $this->db->get('tb_profile');
        return $query->result();
    }

    function insertData($data)
    {
        $this->db->insert('tb_profile', $data);
        $this->session->set_flashdata('msg_alert', 'Data Profile berhasil ditambah');
    }

    function getDataDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tb_profile');
        return $query->row();
    }

    function updateData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_profile', $data);
        $this->session->set_flashdata('msg_alert', 'Data Profile berhasil diubah');
    }

    function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_profile');
        $this->session->set_flashdata('msg_alert', 'Data Profile berhasil dihapus');
    }
}
