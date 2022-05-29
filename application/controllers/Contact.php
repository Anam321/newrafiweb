<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_contact_us', 'contact');
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



            // 'kategori' => $this->katalog->get_kategori()->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/contact_v', $data);
        $this->load->view('layout/footer', $data);
    }

    public function input_message()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
                'subject' => $this->input->post('subject'),
                'date_post' => date("Y-m-d H:i:s"),
                'foto' => 'default.png',
                'hits' => 1,
                'trash' => 0,
            );

            $insert = $this->contact->input_message($data);
            echo json_encode($insert);
        }
    }
    public function alertnotif()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data[] = '

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Terima Kasih!</strong> Terimaksih telah menghubungi kami, kami akan meninjau Pesan anda dan kami akan segaera menghubungi anda. Cek Email atau spam emai untuk langkah selanjutnya.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
            echo json_encode($data);
        }
    }
}
