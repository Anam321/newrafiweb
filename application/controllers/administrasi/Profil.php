<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Profil | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/profil_v', $data);
        $this->load->view('js/profile_js', $data);
        $this->load->view('js/navbar_js', $data);
        $this->load->view('themplates/footer', $data);
    }

    public function dataprofil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $list = $this->profil->get_data();
            $data = array();
            foreach ($list as $row) {

                $data[] = '<div class="card text-center">
                <div class="card-header"
                    style="background-image: url(' . ' ' . base_url() . 'assets/upload/poto/' . $row['foto'] . '' . '); background-size:cover; background-position: center; background-repeat: no-repeat;">
                    <img src="' . base_url() . 'assets/upload/logo/' . $row['logo'] . '"
                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-0 mt-2 text-white">' . $row['nama'] . '</h4>
                    <p class="text-muted font-14">' . $row['alamat'] . '</p>

                    <button type="button" onclick="ubahpoto()" class="btn btn-success btn-sm mb-2">Upload</button>
                    
                </div>
                <div class="card-body">


                    <div class="text-start mt-3">
                        <h4 class="font-13 text-uppercase">About Me :</h4>
                        <p class="text-muted font-13 mb-3">
                          ' . $row['deskripsi'] . '
                        </p>
                      
                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">+62' . $row['telpon'] . '</span></p>
                        <p class="text-muted mb-2 font-13"><strong>Whatsapp :</strong><span class="ms-2">+62' . $row['whatsap'] . '</span></p>
                        <p class="text-muted mb-2 font-13"><strong>Facebook :</strong><span class="ms-2">' . $row['facebook'] . '</span></p>
                        <p class="text-muted mb-2 font-13"><strong>Instagram :</strong><span class="ms-2">' . $row['instagram'] . '</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                class="ms-2 ">' . $row['email'] . '</span></p>

                        <p class="text-muted mb-1 font-13"><strong>Alamat :</strong> <span class="ms-2">' . $row['alamat'] . '</span></p>
                    </div>

                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="' . $row['facebook'] . '" class="social-list-item border-primary text-primary"><i
                                    class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="' . $row['instagram'] . '" class="social-list-item border-danger text-danger"><i
                                    class="mdi mdi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="' . $row['whatsap'] . '" class="social-list-item border-info text-info"><i
                                    class="mdi mdi-whatsapp"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                    class="mdi mdi-github"></i></a>
                        </li>
                    </ul>

                    <button type="button" onclick="profiledit()" class="btn btn-info mt-3"><i class="mdi mdi-lastpass me-1"></i> <span>Edit Profil</span> </button>
                </div>
            </div>';
            }
            echo json_encode($data);
        }
    }





    public function editprofil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->profil->get_profilByid();
            echo json_encode($data);
        }
    }

    public function updateprof()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'deskripsi' => $this->input->post('deskripsi'),
                'alamat' => $this->input->post('alamat'),
                'company_name' => $this->input->post('company_name'),
                'web_url' => $this->input->post('web_url'),


            );



            $update = $this->profil->updateprof(array('profil_id' => $this->input->post('profil_id')), $data);
            echo json_encode($update);
        }
    }

    public function updatekontak()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array(
                'telpon' => $this->input->post('telpon'),
                'email' => $this->input->post('email'),
                'whatsap' => $this->input->post('whatsap'),
                'facebook' => $this->input->post('facebook'),
                'instagram' => $this->input->post('instagram'),
                'github' => $this->input->post('github'),

            );
            // print_r($data);
            $update = $this->profil->updatekontak(array('kontak_id' => $this->input->post('kontak_id')), $data);
            echo json_encode($update);
        }
    }

    public function upload_logo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_FILES["logo"]["name"])) {
                $config['upload_path'] = './assets/upload/logo/';
                $config['file_name'] = time();
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['overwrite'] = true;
                $config['max_size'] = 3024; // 1MB

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('logo')) {
                    $insert['status'] = '01';
                    $insert['type'] = 'error';
                    $insert['mess'] = $this->upload->display_errors();
                    echo json_encode($insert);
                } else {
                    $image_data = $this->upload->data();
                    //direktori file

                    $id = 1;
                    $data = array(

                        'logo' => $image_data['file_name'],
                    );

                    $update = $this->profil->updateprof(array('profil_id' => $this->input->post('profil_id')), $data);
                    echo json_encode($update);
                }
            }
        }
    }


    public function upload_cover()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_FILES["foto"]["name"])) {
                $config['upload_path'] = './assets/upload/poto/';
                $config['file_name'] = time();
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


                    $data = array(

                        'foto' => $image_data['file_name'],
                    );

                    $update = $this->profil->updateprof(array('profil_id' => $this->input->post('profil_id')), $data);
                    echo json_encode($update);
                }
            }
        }
    }
}
