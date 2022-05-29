<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori_m extends CI_Model
{

    public function get_histori()
    {
        $this->db->select('*');
        $this->db->from('histori');
        $this->db->order_by('histori_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_historibyid($id)
    {

        $this->db->select("*");
        $this->db->from('histori');
        $this->db->where('histori_id', $id);

        // $query = $this->db->get();
        // return $query->result_array();

        // AJAX SERVERSIDE :

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function get_detailhistor($id)
    {

        $this->db->select("*");
        $this->db->from('histori');
        $this->db->where('histori_id', $id);

        $query = $this->db->get();
        return $query->result_array();

        // AJAX SERVERSIDE :

        // $query = $this->db->get();
        // if (count($query->result()) > 0) {
        //     return $query->row();
        // }
    }


    public function input($data)
    {
        $r = $this->db->insert('histori', $data);

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
        $r = $this->db->update('histori', $data, $where);
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


    public function delete_Byid($id)
    {

        $q = $this->db->query("select foto from histori where histori_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);

        $path = './assets/upload/gallery/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('histori_id', $id);
        $r = $this->db->delete('histori');

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
