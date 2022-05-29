<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapseting_m extends CI_Model
{




    public function getdata()
    {

        $this->db->select("*");
        $this->db->from('tweb_map');
        $this->db->where('id', 1);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    public function getdatamap()
    {

        $this->db->select("*");
        $this->db->from('tweb_map');
        $this->db->where('id', 1);
        $query = $this->db->get();
        return $query;
    }

    public function update($id, $data)
    {
        $r = $this->db->update('tweb_map', $data, $id);
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


    public function get_kategori()
    {

        $this->db->select('*');
        $this->db->from('tweb_kategori');
        $query = $this->db->get();
        return $query;
    }
}
