<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_katalog extends CI_Model
{


    public function get_dataproduk()
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->order_by('produk_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_kategori()
    {
        $this->db->select('*');
        $this->db->from('tweb_kategori');
        // $this->db->order_by('kategori', 'DESC');

        $query = $this->db->get();
        return $query;
    }
    public function get_katalog()
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->order_by('produk_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }

    public function orderbykategori($kategori)
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->where('kategori', $kategori);
        // $this->db->order_by('produk_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_prod($slug)
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->where('slug', $slug);

        $query = $this->db->get();
        return $query;
    }
    function get_foto($id)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        return $query;
    }



    public function get_artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel a');
        $this->db->order_by('artikel_id', 'DESC');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query;
    }

    public function input_visit($data)
    {
        $this->db->insert('section_visit', $data);
    }
}
