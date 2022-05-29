<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_m extends CI_Model
{




    public function get_dataslide()
    {
        $this->db->select('*');
        $this->db->from('set_hero');
        $this->db->order_by('hero_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_slidByid($id)
    {

        $this->db->select('*');
        $this->db->from('set_hero');
        $this->db->where('hero_id', $id);
        // $query = $this->db->get();
        // return $query->result_array();

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }


    public function switch($id, $data)
    {
        $this->db->where('hero_id', $id);
        $r = $this->db->update('set_hero', $data);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Data Berhasil Update';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal Update Data';
        }
        return $res;
    }



    public function input_slide($data)
    {
        $r = $this->db->insert('set_hero', $data);

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

    public function update($where, $data)
    {


        $r = $this->db->update('set_hero', $data, $where);
        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Berhasil Upload';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Gagal upload Data';
        }
        return $res;
        // }
    }
    public function delete_by_id($id)
    {

        $q = $this->db->query("select foto from set_hero where hero_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);

        $path = './assets/upload/gallery/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('hero_id', $id);
        $r = $this->db->delete('set_hero');

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
