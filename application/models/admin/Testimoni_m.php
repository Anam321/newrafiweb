<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni_m extends CI_Model
{
    function getJlhdata()
    {
        $sql = "select * from testimoni where confirm=1";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql)->num_rows();
        $data = '';
        if ($query) {
            $data = $query;
        }
        return $data;
    }

    public function get_dataTestimoni()
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->where('confirm', 0);
        $this->db->order_by('id_testi', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_databyId($id)
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->where('id_testi', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_newtesti()
    {
        $this->db->select('*');
        $this->db->from('testimoni');
        $this->db->order_by('id_testi', 'DESC');
        $this->db->where('confirm', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function switch($id, $data)
    {
        $this->db->where('id_testi', $id);
        $r = $this->db->update('testimoni', $data);
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

    public function delete_by_id($id)
    {

        $q = $this->db->query("select foto from testimoni where id_testi = '$id'")->row();
        $foto = $q->foto;

        // var_dump($foto);

        $path = './assets/upload/poto/';
        // hapus file
        if (file_exists($path . $foto)) {
            unlink($path . $foto);
        }


        $this->db->where('id_testi', $id);
        $r = $this->db->delete('testimoni');

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
