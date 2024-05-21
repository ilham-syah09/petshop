<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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
			'title'  => 'Daftar Paket',
			'navbar' => 'admin/navbar',
			'page'   => 'admin/paket',
			'paket'  => $this->admin->getPaket()
		];

		$this->load->view('index', $data);
	}

	public function add()
	{
		$data = [
			'namaPaket'   => $this->input->post('namaPaket'),
			'harga'       => $this->input->post('harga')
		];

		$insert = $this->db->insert('paket', $data);

		if ($insert) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan');
		}

		redirect('admin/paket', 'refresh');
	}

	public function edit()
	{
		$data = [
			'namaPaket'   => $this->input->post('namaPaket'),
			'harga'       => $this->input->post('harga')
		];

		$this->db->where('id', $this->input->post('id'));
		$update = $this->db->update('paket', $data);

		if ($update) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil diedit');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal diedit');
		}

		redirect('admin/paket', 'refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('paket');

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!!');
		}

		redirect('admin/paket');
	}
}

/* End of file Paket.php */
