<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gallery', 'gallery');
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
            'gallery' => $this->gallery->get_gallery()->result(),

            'B_produk' => $this->profil->get_B_produk()->result(),
            'produklimit' => $this->profil->produklimit()->result(),
            'artikellimit' => $this->profil->art()->result(),


            // 'kategori' => $this->katalog->get_kategori()->result(),

        ];



        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('pages/gallery_v', $data);
        $this->load->view('layout/footer', $data);
    }
}
