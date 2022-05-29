<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_katalog', 'katalog');
        $this->load->model('admin/Profil_m', 'profil');

        $autoload['helper'] = array('text');
        $this->load->library('session');
    }
    public function index()
    {


        $data = [

            'judul' => $this->profil->get_profile('nama'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),
            'email' => $this->profil->get_kontak('email'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'foto' => $this->profil->get_profile('foto'),

            'B_produk' => $this->profil->get_B_produk()->result(),
            'produklimit' => $this->profil->produklimit()->result(),
            'artikellimit' => $this->profil->art()->result(),

            'dataKatalog' => $this->katalog->get_katalog()->result(),

            'kategori' => $this->katalog->get_kategori()->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/katalog_v', $data);
        $this->load->view('pages/katalog_js');
        $this->load->view('layout/footer', $data);
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

    public function listkatalog()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produk = $this->katalog->get_dataproduk();
            $data = array();
            foreach ($produk as $row) {
                $id = $row['produk_id'];
                $visitorproduk = $this->db->query("SELECT * FROM section_visit WHERE produk_id=$id")->num_rows();
                $list = ' 
            
         
 
               <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" height="50" class="img-fluid" alt="">
                               
                            </div>
                            <div class="member-info">
                                <a href="' . base_url() . 'katalog/detailproduk/' . $row['slug'] . '/' . $row['produk_id'] . '">
                                    <h4>' . $row['nama_produk'] . '</h4>
                                </a>
                                <span>' . $row['kategori'] . '</span>
                                <span><i class="bi bi-eye"> </i>' . $visitorproduk . ' Lihat</span>
                                <span><i class="bi bi-clock"></i></i> </i> ' .  $this->waktu_lalu($row['date_post'])  . '</span>

                            </div>
                        </div>
                    </div>
              
        ';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function orderbykategori($kategori)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $produk = $this->katalog->orderbykategori($kategori);
            $data = array();
            foreach ($produk as $row) {
                $id = $row['produk_id'];
                $visitorproduk = $this->db->query("SELECT * FROM section_visit WHERE produk_id=$id")->num_rows();
                $list = ' <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                            <div class="member-img">
                                <img src="' . base_url() . 'assets/upload/gallery/' . $row['foto'] . '" height="50" class="img-fluid" alt="">
                               
                            </div>
                            <div class="member-info">
                                <a href="' . base_url() . 'katalog/detailproduk/' . $row['slug'] . '/' . $row['produk_id'] . '">
                                    <h4>' . $row['nama_produk'] . '</h4>
                                </a>
                                <span>' . $row['kategori'] . '</span>
                                <span><i class="bi bi-eye"> </i>' . $visitorproduk . ' Lihat</span>
                                <span><i class="bi bi-clock"></i></i> </i> ' .  $this->waktu_lalu($row['date_post'])  . '</span>

                            </div>
                        </div>
                    </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }


    public function detailproduk($slug, $id)
    {
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM section_visit WHERE ip='" . $ip . "' AND produk_id='" . $id . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $data = array(
                'produk_id' => $id,
                'ip' => $ip,
                'hits' => 1,
                'date' => $date,
                'online' => $waktu,
                'time' => $timeinsert,
            );
            $this->katalog->input_visit($data);
        }

        // Jika sudah ada, update
        else {
            $this->db->query("UPDATE section_visit SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }
        $lihat  = $this->db->query("SELECT * FROM section_visit WHERE produk_id='" . $id . "'")->num_rows(); // Hitung jumlah pengunjung

        $data = [

            'judul' => $this->profil->get_profile('nama'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'logo' => $this->profil->get_profile('logo'),
            'alamat' => $this->profil->get_profile('alamat'),
            'whatsap' => $this->profil->get_kontak('whatsap'),
            'facebook' => $this->profil->get_kontak('facebook'),
            'instagram' => $this->profil->get_kontak('instagram'),
            'email' => $this->profil->get_kontak('email'),
            'telpon' => $this->profil->get_kontak('telpon'),
            'foto' => $this->profil->get_profile('foto'),

            'B_produk' => $this->profil->get_B_produk()->result(),
            'produklimit' => $this->profil->produklimit()->result(),
            'artikellimit' => $this->profil->art()->result(),

            'detproduk' => $this->katalog->get_prod($slug)->result(),
            'lisfoto' => $this->katalog->get_foto($id)->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/detailproduk_v', $data);
        $this->load->view('pages/katalog_js');
        $this->load->view('layout/footer', $data);
    }
}
