<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox_m extends CI_Model
{

    function getJlhdata($table)
    {
        $sql = "select * from $table where hits =1";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql)->num_rows();
        $data = '';
        if ($query) {
            $data = $query;
        }
        return $data;
    }


    public function get_datamessage()
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('trash', 0);
        $this->db->order_by('id_cont', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_navmessage()
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('hits', 1);
        $this->db->order_by('id_cont', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_databyid($id)
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('id_cont', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_datatrash()
    {
        $this->db->select('*');
        $this->db->from('message');
        $this->db->where('trash', 1);
        $this->db->order_by('id_cont', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function update($id, $data)
    {
        $this->db->where('id_cont', $id);
        $r = $this->db->update('message', $data);
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
