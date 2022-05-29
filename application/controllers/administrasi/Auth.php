<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/profil_m', 'profil');


        $this->load->library('session');
    }
    public function index()
    {

        // $this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = [
                //title Page
                'judul' => 'Login | ' . $this->profil->get_profile('nama'),
                'logo' =>  $this->profil->get_profile('logo'),
                'perusahaan' => $this->profil->get_profile('nama'),

            ];
            $this->load->view('admin/auth_v.php', $data);
            // $this->load->view('themplates/footer.php', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');


        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            // jika berhasil login

            if ($user['is_active'] == 1) {
                if (password_verify($pass, $user['pass'])) {
                    $data = [
                        'username' => $user['username'],

                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('administrasi/dashboard'));
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Error - </strong> Email atau Password Salah...!!
                            </div>');
                    redirect(base_url('administrasi/auth'));
                }
            }
        } else {

            // jika gagal user tidak ada

            $this->session->set_flashdata('message', '<div style="color:red;" class="alert alert-danger" role="alert">
                Email atau password salah !
                </div>');
            redirect(base_url('administrasi/auth'));
        }
        //  var_dump($user);
        // die;
    }

    public function regist()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|valid_email|is_unique[user.username]', ['is_unique' => 'user ini sudah ada!']);
        $this->form_validation->set_rules('pass', 'Password', 'required|trim|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Akun';
            $this->load->view('admin/regist.php', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' =>  htmlspecialchars($this->input->post('username', true)),
                'foto' => 'default.jfif',
                'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

                'is_active' => 0,
                'date_created' => date("Y-m-d H:i:s"),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                    Pendaftaran akun Berhasil
                                    </div>');

            redirect('administrasi/auth');
            // var_dump($data);
            // die;
        }
    }

    // public function logout()
    // {
    //     $data = [
    //         'title' => 'Logout'
    //     ];
    //     $this->load->view($this->module . 'logout_v.php', $data);
    // }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('pass');
        redirect('administrasi/auth');
    }
}
