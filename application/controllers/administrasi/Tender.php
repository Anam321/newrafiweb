<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tender extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Tender_m', 'tender');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Tender | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'kategori' => $this->tender->get_kategori()->result(),
        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/tender_v', $data);
        $this->load->view('js/tender_js', $data);
        $this->load->view('js/navbar_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function datatable()
    {
        $tender = $this->tender->get_data();
        $no = 1;
        foreach ($tender as $row) {

            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $row['nama_tender'];
            $tbody[] = $row['jenis'];
            $tbody[] = $row['pembuatan'];
            if ($row['volume'] == '') {
                $volum = 0;
            } else {
                $volum = '' . $row['volume'] . 'm';
            }

            $tbody[] = $volum;
            $tbody[] = $row['tgl_mulai'];
            $tbody[] = $row['tgl_akhir'];
            $tbody[] = $row['harga'];
            $tbody[] = $row['alamat'];

            $action = '
                   <div class="table-action">
                    <a href="javascript:void(0);" onclick="done(' . $row['projek_id'] . ')" class="action-icon "> <i class="mdi mdi-check"></i></a>
                        <a href="javascript:void(0);" onclick="edit(' . $row['projek_id'] . ')" class="action-icon "> <i class="mdi mdi-square-edit-outline"></i></a>
                        <a href="javascript:void(0);" onclick="hapus(' . $row['projek_id'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($tender) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function input_data()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'nama_tender' => $this->input->post('nama_tender'),
                'jenis' => $this->input->post('jenis'),
                'pembuatan' => $this->input->post('pembuatan'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
                'alamat' => $this->input->post('alamat'),
                'harga' => $this->input->post('harga'),
                'volume' => $this->input->post('volume'),
                'date_post' => date("Y-m-d H:i:s"),
                'status' => 0,

            );

            $insert = $this->tender->input_data($data);
            echo json_encode($insert);
        }
    }

    public function editTender($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->tender->get_dataID($id);
            echo json_encode($data);
        }
    }


    public function update_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'nama_tender' => $this->input->post('nama_tender'),
                'jenis' => $this->input->post('jenis'),
                'pembuatan' => $this->input->post('pembuatan'),
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_akhir' => $this->input->post('tgl_akhir'),
                'alamat' => $this->input->post('alamat'),
                'harga' => $this->input->post('harga'),
                'volume' => $this->input->post('volume'),

            );

            $update = $this->tender->update(array('projek_id' => $this->input->post('projek_id')), $data);
            echo json_encode($update);
        }
    }
    public function done($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idTender = $id;
            $data = array(
                'is_time' => 1,
                'status' => 0,
            );
            $update = $this->tender->done($idTender, $data);
            echo json_encode($update);
        }
    }
    public function arsip($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idTender = $id;
            $data = array(
                'status' => 0,
                'is_time' => 0,
            );
            $update = $this->tender->done($idTender, $data);
            echo json_encode($update);
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->tender->delete_by_id($id);
        }
    }

    public function tenderclear()
    {
        $data = [
            //title Page
            'judul' => 'Tender | ' . $this->profil->get_profile('nama'),
            // 'nama' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/cleartender_v', $data);
        $this->load->view('js/tender_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function old_tender()
    {
        $data = [
            //title Page
            'judul' => 'Tender | ' . $this->profil->get_profile('nama'),
            // 'nama' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/old_tender_v', $data);
        $this->load->view('js/tender_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function datatables()
    {
        $tender = $this->tender->get_dataold();
        $no = 1;
        foreach ($tender as $row) {

            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $row['nama_tender'];
            $tbody[] = $row['jenis'];
            $tbody[] = $row['pembuatan'];
            if ($row['volume'] == '') {
                $volum = 0;
            } else {
                $volum = '' . $row['volume'] . 'm';
            }

            $tbody[] = $volum;
            $tbody[] = $row['tgl_mulai'];
            $tbody[] = $row['tgl_akhir'];
            $tbody[] = $row['harga'];
            $tbody[] = $row['alamat'];

            $data[] = $tbody;
        }
        if ($tender) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function datatablesclear()
    {
        $tender = $this->tender->get_dataclear();
        $no = 1;
        foreach ($tender as $row) {

            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $row['nama_tender'];
            $tbody[] = $row['jenis'];
            $tbody[] = $row['pembuatan'];
            if ($row['volume'] == '') {
                $volum = 0;
            } else {
                $volum = '' . $row['volume'] . 'm';
            }

            $tbody[] = $volum;
            $tbody[] = $row['tgl_mulai'];
            $tbody[] = $row['tgl_akhir'];
            $tbody[] = $row['harga'];
            $tbody[] = $row['alamat'];

            $action = '
                   <div class="table-action">
                  
                      <a href="javascript:void(0);" onclick="arsip(' . $row['projek_id'] . ')" class="btn btn-info btn-sm mb-2"><i class="mdi mdi-folder-multiple-plus me-2"></i>Arsipkan</a>
                    </div>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($tender) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }
}
