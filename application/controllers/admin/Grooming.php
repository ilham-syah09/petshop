<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grooming extends CI_Controller
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
		$date = $this->input->get('tgl');

		if (!$date) {
			$date = date('Y-m-d');
		}

		$data = [
			'title'    => 'Grooming',
			'navbar'   => 'admin/navbar',
			'page'     => 'admin/grooming',
			'grooming' => $this->admin->getGrooming([
				'DATE(grooming.createdAt)' => $date
			]),
			'date' => $date
		];

		$this->load->view('index', $data);
	}

	public function status()
	{
		$data = [
			'statusPembayaran' => $this->input->post('statusPembayaran')
		];

		$this->db->where([
			'id' => $this->input->post('id')
		]);

		$update = $this->db->update('grooming', $data);

		if ($update) {
			$this->session->set_flashdata('toastr-success', 'Status pembayaran berhasil diupdate');
		} else {
			$this->session->set_flashdata('toastr-error', 'Status pembayaran gagal diupdate');
		}

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$delete = $this->db->delete('grooming');

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus');
		}

		redirect($_SERVER['HTTP_REFERER'], 'refresh');
	}
}

  /* End of file Grooming.php */
