<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gallery extends CI_Model
{

    public function get_artikel()
    {

        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('is_active', 1);
        $this->db->order_by('artikel_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }

    function get_histori($limit, $start)
    {
        $query = $this->db->get('histori', $limit, $start);
        return $query;
    }

    public function get_gallery()
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('token', 1);
        $this->db->order_by('gallery_id', 'DESC');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query;
    }
}
