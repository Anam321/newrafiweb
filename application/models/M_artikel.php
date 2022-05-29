<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_artikel extends CI_Model
{

    // public function get_artikel()
    // {
    //     $this->db->select('*');
    //     $this->db->from('artikel');
    //     $this->db->order_by('artikel_id', 'DESC');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function get_artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel a');
        $this->db->order_by('artikel_id', 'DESC');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query;
    }
    function get_artikelbyid($slug)
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query;
    }

    public function input_visit($data)
    {
        $this->db->insert('section_visit', $data);
    }

    // function get_artikel($limit, $start)
    // {
    //     $this->db->where('is_active', 1);
    //     $query = $this->db->get('artikel', $limit, $start);
    //     return $query;
    // }


}
