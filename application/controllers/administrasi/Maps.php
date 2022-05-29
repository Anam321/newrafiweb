<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maps extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Mapseting_m', 'setmap');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Map Setting | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),


        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/map_v', $data);
        $this->load->view('js/map_js', $data);
        $this->load->view('js/navbar_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function datamap()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->setmap->getdata();
            echo json_encode($data);
        }
    }
    public function tampilmaps()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->setmap->getdatamap();
            echo json_encode($data);
        }
    }


    public function subFoto($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $subfoto = $this->katalog->get_datafoto($id);
            $data = array();
            foreach ($subfoto as $row) {

                $list = ' <div class="col-lg-6 mb-2">
                                        
                                        <div class="card card-body">
                                    <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="image" class="img-fluid rounded" />
                                    <a href="javascript: void(0);" onclick="remove(' . $row['gallery_id'] . ')"  class="btn btn-primary">Remove</a>
                                </div>
                                    </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $data = array(
                'codemap' => $this->input->post('codemap'),
            );

            $update = $this->setmap->update(array('id' => $this->input->post('id')), $data);
            echo json_encode($update);
        }
    }
}
