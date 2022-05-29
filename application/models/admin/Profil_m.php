<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_m extends CI_Model
{



    public function get_profile($varams)
    {
        $query = $this->db->get('set_profil')->row();
        // $result = $query;
        $data = $query->$varams;

        return $data;
    }
    public function get_kontak($varams)
    {
        $query = $this->db->get('set_kontak')->row();
        // $result = $query;
        $data = $query->$varams;

        return $data;
    }
    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('set_profil a');
        $this->db->join('set_kontak b', 'a.kontak_id=b.kontak_id');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function get_profilByid()
    {
        $this->db->select("*");
        $this->db->from('set_profil a');
        $this->db->join('set_kontak b', 'a.kontak_id=b.kontak_id');
        $this->db->where('profil_id', 1);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }



    public function updateprof($id, $data)
    {
        $r = $this->db->update('set_profil', $data, $id);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Update Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Update Data';
        }
        return $res;
    }


    public function updatekontak($id, $data)
    {
        $r = $this->db->update('set_kontak', $data, $id);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Update Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Update Data';
        }
        return $res;
    }



    // ---------------------------------------------------------------------------------
    // ---------------------------------------------------------------------------------

    // data untuk fronend right bar


    function get_B_produk()
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->where('best', 1);
        $this->db->order_by('produk_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    function produklimit()
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->limit(8);
        $this->db->order_by('produk_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
    function art()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->limit(8);
        $this->db->order_by('artikel_id', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
