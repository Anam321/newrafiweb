<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Histori_m', 'histori');
        $this->load->model('admin/Profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'perusahaan' => $this->profil->get_profile('nama'),
            'judul' => 'Histori | ' . $this->profil->get_profile('nama'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/histori_v', $data);
        $this->load->view('js/histori_js', $data);
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

    public function list_histori()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $histor =  $this->histori->get_histori();
            $data = array();
            foreach ($histor as $row) {

                $data[] = ' <div class="col-lg-3">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="' . base_url('assets/upload/gallery/') . '' . $row['foto'] . '" alt="Image">
                                <div class="meta-date">

                                        <div class="btn-group btn-group">
											<button class="btn" data-toggle="dropdown" aria-haspopup="true"
												aria-expanded="false"><i class="fas fa-info text-info"></i></button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#" onclick="detailhistor(' . $row['histori_id'] . ')"><i class="fas fa-eye text-info"></i> Lihat</a>
												<a class="dropdown-item" href="#" onclick="edit(' . $row['histori_id'] . ')"><i class="fas fa-edit text-success"></i> Edit</a>
												<a class="dropdown-item" href="#" onclick="delete_data(' . $row['histori_id'] . ')"><i class="fas fa-trash text-info"></i> Hapus</a>
											</div>
										</div>

                                   
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3><a href="#"></a>' . $row['judul_histori'] . '</h3>
                                <h5><a href="#"></a>' . $row['alamat'] . '</h5>
                                <p>
                                   ' . $row['keterangan'] . '
                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><i class="fa fa-eye"></i><a href="#"> ' . $row['visit'] . ' Lihat</a></p>
                                
                                <p><i class="fa fa-clock"></i><a href="#">' . $this->waktu_lalu($row['date_post']) . '</a></p>
                            </div>
                        </div>
                    </div>';
            }
            echo json_encode($data);
        }
    }

    public function detailhistori($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detailpro =  $this->histori->get_detailhistor($id);
            $data = array();
            foreach ($detailpro as $row) {

                $data[] = '
    <div class="row">
        <div class="preview col-md-6">

            <div class="preview-pic tab-content">
                <div class="tab-pane active" id="pic-0"><img
                        src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" />
                </div>
               
                
            </div>
           
        </div>
        <div class="details col-md-6">
            <h3 class="product-title"> ' . $row['judul_histori'] . '</h3>
            <div class="rating">
                <span class="review-no"><i class="fa fa-eye"></i> reviews ' . $row['visit'] . ' </span>
               
                <span class="review-no"><i class="fa fa-clock"></i>  ' . $row['date_post'] . ' </span>
            </div>
            <p class="product-description"> ' . $row['keterangan'] . '</p>
            
        </div>
    </div>
';
            }
            echo json_encode($data);
        }
    }
    public function edit_histori($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->histori->get_historibyid($id);
            echo json_encode($data);
        }
    }

    public function input_histori()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = str_replace(' ', '-', $this->input->post('judul_histori'));
            $config['upload_path'] = './assets/upload/gallery/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = strtolower($name) . '-' . time();
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
                    'judul_histori' => $this->input->post('judul_histori'),
                    'keterangan' => $this->input->post('keterangan'),
                    'alamat' => $this->input->post('alamat'),
                    'date_post' => date("Y-m-d H:i:s"),
                    'foto' => $image_data['file_name'],
                );
                $insert = $this->histori->input($data);
                echo json_encode($insert);
            }
        }
    }

    public function update()
    {

        $slug = str_replace(' ', '-', $this->input->post('judul_histori'));
        $id = $this->input->post('artikel_id');
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
                $path = 'assets/upload/gallery/';
                $filename = $this->input->post('foto');
                //hapus file
                if (file_exists($path . $filename)) {
                    unlink($path . $filename);
                }

                $data = array(
                    'judul_histori' => $this->input->post('judul_histori'),
                    'keterangan' => $this->input->post('keterangan'),
                    'alamat' => $this->input->post('alamat'),
                    'date_post' => date("Y-m-d H:i:s"),
                    'foto' => $image_data['file_name'],
                );
            }
        } else {
            $data = array(
                'judul_histori' => $this->input->post('judul_histori'),
                'keterangan' => $this->input->post('keterangan'),
                'alamat' => $this->input->post('alamat'),
                'date_post' => date("Y-m-d H:i:s"),
            );

            $insert = $this->histori->update(array('histori_id' => $this->input->post('histori_id')), $data);
            echo json_encode($insert);
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->histori->delete_Byid($id);
        }
    }
}
