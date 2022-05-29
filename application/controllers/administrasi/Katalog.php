<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Katalog_m', 'katalog');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Katalog | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'kategori' => $this->katalog->get_kategori()->result(),

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/katalog_v', $data);
        $this->load->view('js/katalog_js', $data);
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
        $produkrow = $this->katalog->get_produk();
        foreach ($produkrow as $row) {
            $id = $row['produk_id'];
            $visitorproduk = $this->db->query("SELECT * FROM section_visit WHERE produk_id=$id")->num_rows();
            $tbody = array();
            $gambar = '  <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" alt="contact-img" title="contact-img" class="rounded me-3" height="48">
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="apps-ecommerce-products-details.html" class="text-body">' . $row['nama_produk'] . '</a>
                                                <br>
                                                ' . $visitorproduk . ' Dilihat
                                            </p>';
            $tbody[] = $gambar;

            $tbody[] = $row['kategori'];
            $tbody[] = $this->waktu_lalu($row['date_post']);
            if ($row['harga'] == '') {
                $ha = 0;
            } else {
                $ha = 'IDR ' . $row['harga'] . '';
            }

            $tbody[] = $ha;

            if ($row['best'] == 1) {
                $switch = '<button type="button" class="btn btn-success btn-sm">ON</button><button onclick="no_activ(' . $row['produk_id'] . ')" type="button" class="btn btn-dark  btn-sm">OF</button>';
            } else {
                $switch = '<button type="button" onclick="activ(' . $row['produk_id'] . ')" class="btn btn-dark btn-sm">ON</button><button type="button" class="btn btn-danger btn-sm">OF</button>';
            }


            $tbody[] =  $switch;
            $action = '
                   <div class="table-action">
                   
                        <a href="javascript:void(0);" onclick="detail(' . $row['produk_id'] . ')" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                        <div class="btn-group dropstart">
                        <a href="javascript:void(0);" class="action-icon " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-square-edit-outline"></i></a>
                         <div class="dropdown-menu bg-dark ">
                            <a class="dropdown-item " href="javascript:void(0);" onclick="edit(' . $row['produk_id'] . ')">Edit Produk</a>
                            <a class="dropdown-item " href="javascript:void(0);" onclick="addfoto(' . $row['produk_id'] . ')">Tambah Foto</a>
                        </div> 
                        </div>
                        <a href="javascript:void(0);" onclick="hapus(' . $row['produk_id'] . ')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                    </div>
';
            $tbody[] = $action;

            $data[] = $tbody;
        }
        if ($produkrow) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    public function detailProduk($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detailpro = $this->katalog->get_detailproduk($id);
            $fotoproduk = $this->katalog->get_fotoproduk($id);
            $data = array();

            foreach ($detailpro as $row) {

                $list = '<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <!-- Product image -->
                                                <a href="javascript: void(0);" class="text-center d-block mb-4">
                                                  <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" class="img-fluid" style="max-width: 450px;" alt="Product-img">
                                                </a>
                                                <div class="row">
                                                ';

                foreach ($fotoproduk as $fot) {
                    $foto = $fot['foto'];
                    $list .= ' <div class="col-lg-4"> 
                                <a href="javascript: void(0);">
                                                        <img src="' . base_url() . 'assets/upload/gallery/' . $foto . '" class="img-fluid img-thumbnail p-2" style="max-width: 165px;" alt="Product-img">
                                                    </a>
                                </div>';
                }
                $list .= ' </div>
                            
                                            </div> 
                                            <div class="col-lg-6">
                                                <form class="ps-lg-4">
                                                  
                                                    <h3 class="mt-0">' . $row['slug'] . ' <a href="javascript: void(0);" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>
                                                    <p class="mb-1">Added Date: ' . $this->waktu_lalu($row['date_post']) . '</p>

                                             
                                                    <div class="mt-3">
                                                        <h4><span class="badge badge-success-lighten">Instock</span></h4>
                                                    </div>

                                            
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Retail Price:</h6>
                                                        <h3> IDR ' . $row['harga'] . '</h3>
                                                    </div>
                                                
                                                    <div class="mt-4">
                                                        <h6 class="font-14">Description:</h6>
                                                      ' . $row['deskripsi'] . '
                                                    </div>

                                                </form>
                                            </div>
                                        </div> 

                                    </div> 
                                </div> 
                            </div> 
                        </div>';

                $data[] = $list;
            }

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
    public function input_produk()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('nama_produk'));
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
                if ($this->input->post('harga') == '') {
                    $quantity = 0;
                } else {
                    $quantity = $this->input->post('harga');
                }
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'slug'          => strtolower($slug),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' =>  $quantity,
                    'kategori' => $this->input->post('kategori'),
                    'date_post' => date("Y-m-d H:i:s"),
                    'foto' => $image_data['file_name'],
                );

                $insert = $this->katalog->input_produk($data);
                echo json_encode($insert);
            }
        }
    }

    public function fileUpload()
    {
        if (!empty($_FILES['file']['name'])) {

            // Set preference
            $config['upload_path'] = './assets/upload/gallery/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['overwrite'] = true;
            $config['max_size'] = 3024; // 1MB
            $config['file_name'] = $_FILES['file']['name'];

            //Load upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            // File upload

            if ($this->upload->do_upload('file')) {
                $id = $this->input->post('produk_id');
                $image_data = $this->upload->data();
                $token = 2;
                $data = array(
                    'foto' => $image_data['file_name'],
                    'produk_id' => $this->input->post('produk_id'),
                    'token' => $token,
                );
                $insert =  $this->katalog->uploadFile($data, $id);
                echo json_encode($insert);
            }
        }
    }


    public function editproduk($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->katalog->get_produkByid($id);
            echo json_encode($data);
        }
    }

    public function update_produk()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $slug = str_replace(' ', '-', $this->input->post('nama_produk'));

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
                        'nama_produk' => $this->input->post('nama_produk'),
                        'slug'          => strtolower($slug),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'kategori' => $this->input->post('kategori'),
                        'harga' => $this->input->post('harga'),
                        'foto'          => $image_data['file_name'],

                    );
                }
            } else {
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'slug'          => strtolower($slug),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                );
            }

            $update = $this->katalog->update(array('produk_id' => $this->input->post('produk_id')), $data);
            echo json_encode($update);
        }
    }

    public function delete_data($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->katalog->delete_by_id($id);
        }
    }
    public function delete_foto($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $this->katalog->delete_foto_id($id);
        }
    }



    public function active($id)
    {
        $id_testi = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'best' => 1,
            );
        }
        $update = $this->katalog->switch($id_testi, $data);
        echo json_encode($update);
    }
    public function not_active($id)
    {
        $id_testi = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'best' => 0,
            );
        }
        $update = $this->katalog->switch($id_testi, $data);
        echo json_encode($update);
    }
}
