<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nomor_anggota'  => $this->input->post('Nomor_anggota'),
            'nama'           => $this->input->post('Nama'),
            'alamat'         => $this->input->post('Alamat'),
            'telepon'        => $this->input->post('Telepon'),
            'email'          => $this->input->post('Email'),
            'tanggal_daftar' => $this->input->post('Tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->insert($data);
        redirect('anggota');
    }

    public function hapus($nomor_anggota)
    {
        $this->anggota_model->delete($nomor_anggota);
        redirect('anggota');
    }

    public function edit($nomor_anggota)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($nomor_anggota);

        if(!$data['anggota']){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($nomor_anggota)
    {
        $data = [
            'nama'           => $this->input->post('Nama'),
            'alamat'         => $this->input->post('Alamat'),
            'telepon'        => $this->input->post('Telepon'),
            'email'          => $this->input->post('Email'),
            'tanggal_daftar' => $this->input->post('Tanggal_daftar'),
            'status'         => $this->input->post('status')
        ];

        $this->anggota_model->update($nomor_anggota, $data);
        redirect('anggota');
    }
}