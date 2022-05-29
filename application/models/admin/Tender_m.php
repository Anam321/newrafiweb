<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender_m extends CI_Model
{
    public function get_kategori()
    {

        $this->db->select('*');
        $this->db->from('tweb_kategori');
        $query = $this->db->get();
        return $query;
    }
    public function get_data()
    {

        $this->db->select("*");
        $this->db->from('tender');
        $this->db->where('status', 1);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_dataclear()
    {

        $this->db->select("*");
        $this->db->from('tender');
        $this->db->where('is_time', 1);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_dataold()
    {

        $this->db->select("*");
        $this->db->from('tender');
        $this->db->where('status', 0);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_dataID($id)
    {
        $this->db->select("*");
        $this->db->from('tender');
        $this->db->where('projek_id', $id);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    public function input_data($data)
    {
        $r = $this->db->insert('tender', $data);

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil di Tambahkan';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'gagal di Tambahkan. Kesalahan saat menyimpan data !';
        }
        return $res;
    }

    public function update($id, $data)
    {
        $r = $this->db->update('tender', $data, $id);
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
    public function done($id, $data)
    {
        $this->db->where('projek_id', $id);
        $r = $this->db->update('tender', $data);
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

    public function delete_by_id($id)
    {
        $this->db->where('projek_id', $id);
        $r = $this->db->delete('tender');

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Hapus Data';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Hapus Data';
        }
        return json_encode($res);
    }
}
