<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('log_admin'))) {
            $this->session->set_flashdata('toastr-error', 'Anda Belum Login');
            redirect('auth', 'refresh');
        }

        $this->db->where('id', $this->session->userdata('id'));
        $this->dt_user = $this->db->get('user')->row();

        $this->load->model('M_Admin', 'admin');
    }

    public function index()
    {
        $data = [
            'title'   => 'Kategori Barang',
            'navbar'  => 'admin/navbar',
            'page'    => 'admin/kategori',
            'kategori'  => $this->admin->getKategori(),
        ];

        $this->load->view('index', $data);
    }

    public function add()
    {
        $data = [
            'kategori' => $this->input->post('kategori')
        ];


        $insert = $this->db->insert('kategori', $data);

        if ($insert) {
            $this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan');
        }

        redirect('admin/kategori', 'refresh');
    }

    public function edit()
    {

        $data = [
            'kategori' => $this->input->post('kategori')
        ];


        $this->db->where('id', $this->input->post('id'));
        $update = $this->db->update('kategori', $data);

        if ($update) {
            $this->session->set_flashdata('toastr-success', 'Data berhasil diedit');
        } else {
            $this->session->set_flashdata('toastr-error', 'Data gagal diedit');
        }

        redirect('admin/kategori', 'refresh');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kategori');
        $this->session->set_flashdata('toastr-success', 'Data berhasil dihapus');
        redirect('admin/kategori');
    }
}

/* End of file Home.php */
