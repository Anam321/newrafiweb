<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog_m extends CI_Model
{

    public function get_kategori()
    {

        $this->db->select('*');
        $this->db->from('tweb_kategori');
        $query = $this->db->get();
        return $query;
    }

    public function get_produk()
    {
        $this->db->select('*');
        $this->db->from('ref_produk');
        $this->db->order_by('produk_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_detailproduk($id)
    {

        $this->db->select("*");
        $this->db->from('ref_produk');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_fotoproduk($id)
    {

        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_datafoto($id)
    {

        $this->db->select("*");
        $this->db->from('gallery');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_produkByid($id)
    {
        $this->db->select("*");
        $this->db->from('ref_produk');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update($id, $data)
    {
        $r = $this->db->update('ref_produk', $data, $id);
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

    public function input_produk($data)
    {
        $r = $this->db->insert('ref_produk', $data);

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
    public function uploadFile($data)
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

    public function delete_by_id($id)
    {
        $q = $this->db->query("select foto from ref_produk where produk_id = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);
        $path = './assets/upload/gallery/';
        //hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }

        $q2 = $this->db->query("select * from gallery where produk_id = '$id'")->result();
        foreach ($q2 as $dd) {
            $foto2 = $dd->file;
            $path2 = './assets/upload/gallery/';
            //hapus file
            if (file_exists($path2 . $foto2)) {
                unlink($path2 . $foto2);
            }
        }

        $this->db->where('produk_id', $id);
        $r = $this->db->delete('ref_produk');

        $this->db->where('produk_id', $id);
        $r2 = $this->db->delete('gallery');

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


    public function switch($id, $data)
    {
        $this->db->where('produk_id', $id);
        $r = $this->db->update('ref_produk', $data);
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
}
