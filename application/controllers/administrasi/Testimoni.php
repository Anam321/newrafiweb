<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Testimoni_m', 'testimoni');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Testimoni | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/testimoni_v', $data);
        $this->load->view('js/testimoni_js', $data);
        $this->load->view('js/navbar_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp);
        $detik = $selisih;
        $menit = round($selisih / 60);
        $jam = round($selisih / 3600);
        $hari = round($selisih / 86400);
        $minggu = round($selisih / 604800);
        $bulan = round($selisih / 2419200);
        $tahun = round($selisih / 29030400);
        if ($detik <= 60) {
            $waktu = $detik . ' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit . ' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam . ' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari . ' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu . ' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan . ' bulan yang lalu';
        } else {
            $waktu = $tahun . ' tahun yang lalu';
        }
        return $waktu;
    }

    public function datatable()
    {
        $listTesti = $this->testimoni->get_dataTestimoni();
        foreach ($listTesti as $row) {

            $tbody = array();
            $gambar = '  <img src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="apps-ecommerce-products-details.html" class="text-body">' . $row['nama'] . '</a>
                                                
                                            </p>';
            $tbody[] = $gambar;

            $tbody[] = $row['email'];
            $tbody[] = $this->waktu_lalu($row['date_post']);

            if ($row['is_active'] == 1) {
                $switch = '<button type="button" class="btn btn-success btn-sm">ON</button><button onclick="no_activ(' . $row['id_testi'] . ')" type="button" class="btn btn-dark  btn-sm">OF</button>';
            } else {
                $switch = '<button type="button" onclick="activ(' . $row['id_testi'] . ')" class="btn btn-dark btn-sm">ON</button><button type="button" class="btn btn-danger btn-sm">OF</button>';
            }


            $tbody[] =  $switch;

            $action = '
                   <div class="table-action">
                   
                        <a href="javascript:void(0);" onclick="lihat(' . $row['id_testi'] . ')" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                        <div class="btn-group dropstart">
                        
                        <a href="javascript:void(0);" onclick="remove(' . $row['id_testi'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($listTesti) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    public function detTesti($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $testiId = $this->testimoni->get_databyId($id);
            $data = array();
            foreach ($testiId as $row) {

                $list = '  <div class="card-body">
                    <img src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2">' . $row['nama'] . '</h4>
                    <p class="text-muted font-14">' . $row['email'] . '</p>

                    <div class="text-start mt-3">

                        <p class="text-muted font-13 mb-3">
                            "' . $row['testi'] . '"
                        </p>

                    </div>

                </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function active($id)
    {
        $id_testi = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'is_active' => 1,
            );
        }
        $update = $this->testimoni->switch($id_testi, $data);
        echo json_encode($update);
    }
    public function not_active($id)
    {
        $id_testi = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'is_active' => 0,
            );
        }
        $update = $this->testimoni->switch($id_testi, $data);
        echo json_encode($update);
    }

    public function terima($id)
    {
        $id_testi = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'confirm' => 0,
            );
        }
        $update = $this->testimoni->switch($id_testi, $data);
        echo json_encode($update);
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->testimoni->delete_by_id($id);
        }
    }

    public function jumlahnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->testimoni->getJlhdata('testimoni');
            echo json_encode($data);
        }
    }

    public function new_testi()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $notiftesti = $this->testimoni->get_newtesti();
            $data = array();
            foreach ($notiftesti as $row) {

                $data[] = ' <tr><td> <a type="button"><img
                                            src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" width="32"
                                            height="32" class="rounded-circle my-n1" alt="Avatar"></a></td>
                                <td>' . $row['nama'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['testi'] . '</td>
                                <td>' . $this->waktu_lalu($row['date_post']) . '</td>
                                <td><div class="table-action">
                   
                        <a href="javascript:void(0);" onclick="terima(' . $row['id_testi'] . ')" class="action-icon"> <i class="mdi mdi-check-bold"></i></a>
                        <div class="btn-group dropstart">
                        
                        <a href="javascript:void(0);" onclick="hapus(' . $row['id_testi'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div></td>
                                </tr>';
            }
            echo json_encode($data);
        }
    }
}
