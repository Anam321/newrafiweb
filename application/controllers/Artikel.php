<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_artikel', 'artikel');
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

            // 'artikel' => $this->artikel->get_artikel()->result(),
            'artikel' => $this->artikel->get_artikel()->result(),


        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/artikel_v', $data);
        // $this->load->view('pages/artikel_js');
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



    public function listartikel()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $artikeldata = $this->artikel->get_artikel();
            $data = array();
            foreach ($artikeldata as $row) {
                $text = $row['konten'];
                $limitext = word_limiter($text, 25);
                $list = ' 
            
            <div class="col-md-4 mb-4">
                    <div class="card border-0 mb-2">
                        <img class="card-img-top" src="' . base_url() . 'assets/upload/artikel/' . $row['foto'] . '" alt="">
                        <div class="card-body bg-white p-4">
                            <div class="d-flex align-items-center mb-3">
                                <a class="btn btn-primary" href="' . base_url() . 'artikel/single/' . $row['slug'] . '/' . $row['artikel_id'] . '"><i class="fa fa-link"></i></a>
                                <h5 class="m-0 ml-3 text-truncate">' . $row['judul_artikel'] . '</h5>
                            </div>
                            ' . $limitext . '
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> ' . $row['penerbit'] . '</small>
                                <small class="mr-3"><i class="fa fa-eye text-primary"></i> 20</small>
                                <small class="mr-3"><i class="fa fa-clock text-primary"></i> ' .  $this->waktu_lalu($row['date_post'])  . '</small>
                            </div>
                        </div>
                    </div>
                </div>
            
            ';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function single($slug, $id)
    {

        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM section_visit WHERE ip='" . $ip . "' AND artikel_id='" . $id . "'")->num_rows();
        $ss = isset($s) ? ($s) : 0;
        // Kalau belum ada, simpan data user tersebut ke database
        if ($ss == 0) {
            $data = array(
                'artikel_id' => $id,
                'ip' => $ip,
                'hits' => 1,
                'date' => $date,
                'online' => $waktu,
                'time' => $timeinsert,
            );
            $this->artikel->input_visit($data);
        }

        // Jika sudah ada, update
        else {
            $this->db->query("UPDATE section_visit SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
        }
        $lihat  = $this->db->query("SELECT * FROM section_visit WHERE artikel_id='" . $id . "'")->num_rows(); // Hitung jumlah pengunjung
        // Hitung jumlah pengunjung
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

            'view' => $lihat,
            'single' => $this->artikel->get_artikelbyid($slug)->result(),
        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/single_v', $data);

        $this->load->view('layout/footer', $data);
    }
}
