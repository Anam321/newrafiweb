<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/gallery_m', 'gallery');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Gallery | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),

        ];

        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/gallery_v', $data);
        $this->load->view('js/gallery_js', $data);
        $this->load->view('js/navbar_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function uploadFoto()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('nama_foto'));
            $config['upload_path'] = './assets/upload/gallery/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = strtolower($slug) . '-' . time();
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $insert['status'] = '01';
                $insert['type'] = 'error';
                $insert['mess'] = $this->upload->display_errors();
                echo json_encode($insert);
            } else {
                $token = 1;
                $image_data = $this->upload->data();
                $data = array(
                    'nama_foto' => $this->input->post('nama_foto'),
                    'token' => $token,
                    'date_post' => date("Y-m-d H:i:s"),
                    'foto' => $image_data['file_name'],
                );

                $insert = $this->gallery->upload_foto($data);
                echo json_encode($insert);
            }
        }
    }


    public function list_foto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $getfoto = $this->gallery->get_foto();

            $data = array();

            foreach ($getfoto as $row) {

                $list = '<div class="col-lg-2 mb-2">
                 <a href="" class="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="image" class="img-fluid rounded" />
                 </a>
                               
                        <div class="dropdown-menu bg-dark">
    <a class="dropdown-item" href="javascript:void(0);" onclick="zoom(' . $row['gallery_id'] . ')">Zoom</a>
    <a class="dropdown-item" href="javascript:void(0);" onclick="remove(' . $row['gallery_id'] . ')">Remove</a>
</div>   
                        </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function datafotoid($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $listfotoid = $this->gallery->get_fotoid($id);

            $data = array();

            foreach ($listfotoid as $row) {

                $list = '
                <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">' . $row['nama_foto'] . '</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
 <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="image" class="img-fluid rounded" />
            </div>
                 ';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }
    public function remove($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->gallery->delete_foto_id($id);
        }
    }
}
