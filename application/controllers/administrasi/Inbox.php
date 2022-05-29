<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Inbox_m', 'inbox');
        $this->load->model('admin/profil_m', 'profil');
        is_logged_in();

        $this->load->library('session');
    }
    public function index()
    {
        $data = [
            //title Page
            'judul' => 'Inbox | ' . $this->profil->get_profile('nama'),
            'logo' =>  $this->profil->get_profile('logo'),
            'perusahaan' => $this->profil->get_profile('nama'),
            'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()

        ];



        $this->load->view('themplates/header', $data);
        $this->load->view('themplates/sidebar', $data);
        $this->load->view('themplates/navbar', $data);
        $this->load->view('admin/inbox_v', $data);
        $this->load->view('js/inbox_js', $data);
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

    public function datamessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $message = $this->inbox->get_datamessage();
            $data = array();
            foreach ($message as $row) {
                $text = $row['message'];
                $limitext = word_limiter($text, 20);
                if ($row['hits'] == 0) {
                    $subject = '<li>
                                                        <div class="email-sender-info">
                                                            <div class="checkbox-wrapper-mail">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="mail2">
                                                                    <label class="form-check-label" for="mail2"></label>
                                                                </div>
                                                            </div>
                                                           
                                                            <a onclick="read(' . $row['id_cont'] . ')" href="javascript: void(0);" class="email-title">' . $row['nama'] . '</a>
                                                        </div>
                                                        <div class="email-content">
                                                            <a onclick="read(' . $row['id_cont'] . ')" href="javascript: void(0);" class="email-subject">' . $limitext . '
                                                            </a>
                                                            <div class="email-date">' . $this->waktu_lalu($row['date_post']) . '</div>
                                                        </div>
                                                        <div class="email-action-icons">
                                                            <ul class="list-inline">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a onclick="remove(' . $row['id_cont'] . ')" href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </li>';
                } else {
                    $subject = ' <li class="unread">
                                    <div class="email-sender-info">
                                        <div class="checkbox-wrapper-mail">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="mail1">
                                                <label class="form-check-label" for="mail1"></label>
                                            </div>
                                        </div>

                                        <a onclick="read(' . $row['id_cont'] . ')" href="javascript: void(0);" class="email-title">' . $row['nama'] . '</a>
                                    </div>
                                    <div class="email-content">
                                        <a onclick="read(' . $row['id_cont'] . ')" href="javascript: void(0);" class="email-subject">' . $limitext . '
                                        </a>
                                        <div class="email-date">' . $this->waktu_lalu($row['date_post']) . '</div>
                                    </div>
                                    <div class="email-action-icons">
                                        <ul class="list-inline">
                                           
                                            <li class="list-inline-item">
                                                <a onclick="remove(' . $row['id_cont'] . ')" href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>';
                }
                $list = $subject;

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }


    public function datatrash()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $trash = $this->inbox->get_datatrash();
            $data = array();
            foreach ($trash as $row) {

                $list = '<li>
                                                        <div class="email-sender-info">
                                                            <div class="checkbox-wrapper-mail">
                                                                <div class="form-check">
                                                                    <input type="checkbox" class="form-check-input" id="mail2">
                                                                    <label class="form-check-label" for="mail2"></label>
                                                                </div>
                                                            </div>
                                                           
                                                            <a href="javascript: void(0);" class="email-title">' . $row['nama'] . '</a>
                                                        </div>
                                                        <div class="email-content">
                                                            <a href="javascript: void(0);" class="email-subject">Last pic over my village &nbsp;&ndash;&nbsp;
                                                                <span>Yeah id like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                                                            </a>
                                                            <div class="email-date">5:01 am</div>
                                                        </div>
                                                        <div class="email-action-icons">
                                                            <ul class="list-inline">
                                                                
                                                                <li class="list-inline-item">
                                                                    <a  href="javascript: void(0);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                                                                </li>
                                                                
                                                            </ul>
                                                        </div>
                                                    </li>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }



    public function readData($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataread = $this->inbox->get_databyid($id);
            $data = array();
            foreach ($dataread as $row) {

                $list = '<div class="mt-3">
                                                <h5 class="font-18">' . $row['subject'] . '</h5>

                                                <hr>

                                                <div class="d-flex mb-3 mt-1">
                                                    <img class="d-flex me-2 rounded-circle" src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" alt="placeholder image" height="32">
                                                    <div class="w-100 overflow-hidden">
                                                        <small class="float-end">' . $this->waktu_lalu($row['date_post']) . '</small>
                                                        <h6 class="m-0 font-14">' . $row['nama'] . '</h6>
                                                        <small class="text-muted">From: ' . $row['email'] . '</small>
                                                    </div>
                                                </div>

                                               <p>' . $row['message'] . '</p>
                                                <p><b>By,</b> <br> ' . $row['nama'] . '</p>
                                                <hr>

                                                <div class="mt-5">
                                                    <a onclick="listmessage()" href="javascript: void(0);" class="btn btn-secondary me-2"><i class="mdi mdi-reply me-1"></i> Kembali</a>
                                               
                                                </div>
                                                  
     
                                            </div>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }


    public function navmessage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $navmesage = $this->inbox->get_navmessage();
            $data = array();
            foreach ($navmesage as $row) {
                $text = $row['message'];
                $limitext = word_limiter($text, 10);
                $list = '<a onclick="allmessage()" href="javascript:void(0);" class="dropdown-item notify-item">
                                 <div class="notify-icon">
                                     <img src="' . base_url() . 'assets/upload/poto/' . $row['foto'] . '" class="img-fluid rounded-circle" alt="">
                                 </div>
                                 <p class="notify-details">' . $row['nama'] . '</p>
                                 <p class="text-muted mb-0 user-msg">
                                     <small>' . $limitext . '</small>
                                 </p>
                             </a>';

                $data[] = $list;
            }

            echo json_encode($data);
        }
    }

    public function hits($id)
    {
        $id_cont = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'hits' => 0,
            );
        }
        $update = $this->inbox->update($id_cont, $data);
        echo json_encode($update);
    }

    public function jumlahnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->inbox->getJlhdata('message');
            echo json_encode($data);
        }
    }

    public function remove($id)
    {
        $id_cont = $id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'trash' => 1,
            );
        }
        $update = $this->inbox->update($id_cont, $data);
        echo json_encode($update);
    }
}
