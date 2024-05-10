<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
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
			'title'  => 'Pesan Masuk',
			'navbar' => 'admin/navbar',
			'page'   => 'admin/pesan',
			'pesan'  => $this->admin->getPesanMasuk()
		];

		$this->load->view('index', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pesan');
		$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus');

		redirect('admin/pesan');
	}
}

/* End of file Pesan.php */
