<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{


    public function get_slide()
    {
        $this->db->select('*');
        $this->db->from('set_hero');
        $this->db->where('is_active', 1);
        $this->db->order_by('hero_id', 'DESC');
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
    public function get_bsproduk()
    {
        $this->db->select('*');
        $this->db->from('gallery a');
        $this->db->join('ref_produk b', 'a.produk_id=b.produk_id');
        $this->db->where('a.token', 2);
        $this->db->order_by('gallery_id', 'DESC');
        // $this->db->limit(12);
        $query = $this->db->get();
        return $query;
    }
    public function get_testimoni()
    {

        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->where('is_active', 1);
        $this->db->order_by('id_testi', 'DESC');
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



    public function input_testi($data)
    {
        $r = $this->db->insert('testimoni', $data);

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Pesan Berhasil Di Kirim';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Pesan gagal Di Kirim !';
        }
        return $res;
    }




    public function insertTracking($data)
    {
        $this->db->insert('whatsappTracking', $data);
    }
    public function input_visit($data)
    {
        $this->db->insert('visitor', $data);
    }
}
