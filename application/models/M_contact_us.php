<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_contact_us extends CI_Model
{


    public function input_message($data)
    {
        $r = $this->db->insert('message', $data);

        if ($r) {
            $res['status'] = '00';
            $res['type'] = 'success';
            $res['mess'] = 'Pesan Berhasil Di Kirim';
        } else {
            $res['status'] = '01';
            $res['type'] = 'warning';
            $res['mess'] = 'Pesan gagal Di Kirim !';
        }
        return $res;
    }
}
