<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/slider_m', 'slid');
        $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Slider | ' . $this->profil->get_profile('nama'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/slider_v', $data);
        $this->load->view('js/slider_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function datatable()
    {
        $slider = $this->slid->get_dataslide();
        foreach ($slider as $row) {

            $tbody = array();
            $gambar = '  <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="apps-ecommerce-products-details.html" class="text-body">' . $row['judul'] . '</a>
                                                
                                            </p>';
            $tbody[] = $gambar;

            $tbody[] = $row['paragraf'];
            $tbody[] = $row['link'];

            if ($row['is_active'] == 1) {
                $switch = '<button type="button" class="btn btn-success btn-sm">ON</button><button onclick="no_activ(' . $row['hero_id'] . ')" type="button" class="btn btn-dark  btn-sm">OF</button>';
            } else {
                $switch = '<button type="button" onclick="activ(' . $row['hero_id'] . ')" class="btn btn-dark btn-sm">ON</button><button type="button" class="btn btn-danger btn-sm">OF</button>';
            }


            $tbody[] =  $switch;

            $action = '
                   <div class="table-action">
                   
                        <a href="javascript:void(0);" onclick="edit(' . $row['hero_id'] . ')" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a> 
                        <a href="javascript:void(0);" onclick="remove(' . $row['hero_id'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($slider) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function input_slide()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('judul'));
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
                $image_data = $this->upload->data();

                $data = array(
                    'judul' => $this->input->post('judul'),
                    'paragraf' => $this->input->post('paragraf'),
                    'link' => $this->input->post('link'),
                    'is_active' => 0,
                    'foto' => $image_data['file_name'],
                );

                $insert = $this->slid->input_slide($data);
                echo json_encode($insert);
            }
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
        $update = $this->slid->switch($id_testi, $data);
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
        $update = $this->slid->switch($id_testi, $data);
        echo json_encode($update);
    }

    public function editslide($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->slid->get_slidByid($id);
            echo json_encode($data);
        }
    }

    public function update_slide()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('judul'));

            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/gallery/';
                $config['file_name'] = strtolower($slug) . '-' . time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
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
                    $image_data = $this->upload->data();
                    //direktori file
                    $path = './assets/upload/gallery/';
                    $filename = $this->input->post('old_foto');
                    //hapus file
                    if (file_exists($path . $filename)) {
                        unlink($path . $filename);
                    }

                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'paragraf' => $this->input->post('paragraf'),
                        'link' => $this->input->post('link'),
                        'foto' => $image_data['file_name'],

                    );
                }
            } else {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'paragraf' => $this->input->post('paragraf'),
                    'link' => $this->input->post('link'),


                );
            }

            $update = $this->slid->update(array('hero_id' => $this->input->post('hero_id')), $data);
            echo json_encode($update);
        }
    }
    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->slid->delete_by_id($id);
        }
    }
}
