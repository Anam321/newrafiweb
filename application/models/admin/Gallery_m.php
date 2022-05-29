<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_m extends CI_Model
{

    public function get_foto()
    {

        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('token', 1);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_fotoid($id)
    {

        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('gallery_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function upload_foto($data)
    {
        $r = $this->db->insert('gallery', $data);

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



    public function delete_foto_id($id)
    {
        $q = $this->db->query("select foto from gallery where gallery_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);
        $path = './assets/upload/gallery/';
        //hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }

        $this->db->where('gallery_id', $id);
        $r = $this->db->delete('gallery');

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
