<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public function get_pengunjung()
    {
        $this->db->select('*');
        $this->db->from('visitor');
        $query = $this->db->get();
        return $query;
    }



    function getJlhdata($table)
    {
        $sql = "select * from $table";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql)->num_rows();
        $data = '';
        if ($query) {
            $data = $query;
        }
        return $data;
    }
    function getJlhdatames($table, $where, $value)
    {
        $sql = "select * from $table where $where = $value";
        // echo $sql;
        // exit;
        $query = $this->db->query($sql)->num_rows();
        $data = '';
        if ($query) {
            $data = $query;
        }
        return $data;
    }

    public function get_panggilan()
    {
        $this->db->select('*');
        $this->db->from('Whatsapptracking');
        $query = $this->db->get();
        return $query;
    }

    public function get_data()
    {
        $this->db->select('*');
        $this->db->from('projek');
        $this->db->order_by('projek_id', 'DESC');
        $this->db->where('is_time', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_produk($limit, $start)
    {
        $query = $this->db->get('produk', $limit, $start);
        return $query;
    }
    public function get_detailproduk($id)
    {

        $this->db->select("*");
        $this->db->from('produk');
        $this->db->where('produk_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_subfoto($id)
    {
        $this->db->select('*');
        $this->db->from('gallery');

        $this->db->where('produk_id', $id);
        $query = $this->db->get();
        return $query->result_array();
        // $this->db->from('gallery');
        // $this->db->where('produk_id', $id);
        // $query = $this->db->get();
        // return $query->result();
    }
}
