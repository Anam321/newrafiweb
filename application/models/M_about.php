<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_about extends CI_Model
{


    public function get_slide()
    {
        // $this->db->select('*');
        // $this->db->from('slide');
        // $this->db->where('is_active', 1);

        // $query = $this->db->get();
        // return $query->result_array();
        $query = $this->db->query("select * from set_slider where is_active = 1 ");
        $data = array();
        foreach ($query->result() as $row) {
            $data[] = array(
                'slid_id' => $row->slid_id,
                'judul_slid' => $row->judul_slid,
                'paragraf' => $row->paragraf,
                'link' => $row->link,
                'gambar' => $row->gambar,
            );
        }
        return $data;
    }
    public function get_slideparent()
    {

        $query = $this->db->query("select * from set_slider where slid_id = 1 ");
        $data = array();
        foreach ($query->result() as $row) {
            $data[] = array(
                'slid_id' => $row->slid_id,
                'judul_slid' => $row->judul_slid,
                'paragraf' => $row->paragraf,
                'link' => $row->link,
                'gambar' => $row->gambar,
            );
        }
        return $data;
    }
    public function get_produk()
    {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->order_by('produk_id', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get();
        return $query;
    }
    public function get_histori()
    {

        $this->db->select('*');
        $this->db->from('histori');
        $this->db->order_by('histori_id', 'DESC');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query;
    }
    public function get_testimoni()
    {

        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->order_by('id_testi', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query;
    }
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

    public function get_profilByid($id)
    {
        $this->db->select("*");
        $this->db->from('set_profil');
        $this->db->join('set_kontak', 'set_profil.kontak_id = set_kontak.kontak_id');
        $this->db->where('set_profil.profil_id', $id);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
}
