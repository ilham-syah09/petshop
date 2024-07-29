<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

        $this->load->library('pdf');
    }

    public function index($th_ini = null, $bln_ini = null)
    {
        if (!$th_ini) {
            $th_ini = $this->admin->getTahunIni();
            if (!$th_ini) {
                $th_ini = date('Y');
            }
        }

        if (!$bln_ini) {
            $bln_ini = $this->admin->getBulanIni($th_ini);
            if (!$bln_ini) {
                $bln_ini = date('n');
            }
        }

        $query = $this->admin->getLaporanPenjualan([
            'orders.statusPembayaran'     => 1,
            'MONTH(orders.createdAt)'     => $bln_ini,
            'YEAR(orders.createdAt)'      => $th_ini
        ]);

        $data = [
            'title'       => 'Lap. Penjualan Barang',
            'navbar'      => 'admin/navbar',
            'page'        => 'admin/laporan_barang',
            'tahun'       => $this->admin->getTahun(),
            'th_ini'      => $th_ini,
            'bln_ini'     => $bln_ini,
            'laporan'     => $query
        ];

        $this->load->view('index', $data);
    }

    public function printLapBrg()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        $pdf = new PDF_Dash();

        $pdf->AddPage();

        $pdf->Image('assets/logo/logo.png', 18, 9, 18, 18);

        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(190, 6, 'Kotaro Petshop', 0, 1, 'C');
        $pdf->Cell(190, 6, 'Jl. Dr. Sutomo No. 13 Slawi (Sblh Timur RSUD. Susilo Slawi)', 0, 1, 'C');
        $pdf->Cell(190, 6, '085641150844', 0, 1, 'C');

        $pdf->SetLineWidth(1);
        $pdf->Line(10, 30, 200, 30);
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 31, 200, 31);

        $pdf->Ln(8);

        $pdf->SetMargins(10, 10, 10);
        $pdf->Cell(190, 6, 'REKAP PENJUALAN BARANG', 0, 1, 'C');

        $pdf->Ln(6);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(10, 8, 'No', 1, 0, 'C');
        $pdf->Cell(50, 8, 'Tanggal', 1, 0, 'C');
        $pdf->Cell(90, 8, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(0, 8, 'Jumlah', 1, 1, 'C');


        $no = 1;

        $bulan = $this->input->get('bln_ini');
        $tahun = $this->input->get('th_ini');


        $query = $this->admin->getLaporanPenjualan([
            'orders.statusPembayaran'   => 1,
            'MONTH(orders.createdAt)'     => $bulan,
            'YEAR(orders.createdAt)'      => $tahun
        ]);

        foreach ($query as $data) {
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(10, 8, $no++, 1, 0, 'C');
            $pdf->Cell(50, 8, tglIndo($data->createdAt), 1, 0, 'C');
            $pdf->Cell(90, 8, $data->nama_barang, 1, 0);
            $pdf->Cell(0, 8, $data->jumlah, 1, 1, 'C');
        }

        $pdf->SetFont('Times', 'B', 12);

        $pdf->Ln(15);
        $pdf->Cell(128.6, 8, '', 0, 0);
        $pdf->Cell(13, 5, 'Tegal, ', 0, 0);
        $pdf->Cell(1, 5, date('d') . ' ' . bulan(date('m')) . ' ' . date('Y'), 0, 1);

        $pdf->Cell(1, 5, '', 0, 1);
        $pdf->Cell(1, 5, '', 0, 1);
        $pdf->Cell(1, 5, '', 0, 1);
        $pdf->Cell(1, 5, '', 0, 1);
        $pdf->Cell(1, 5, '', 0, 1);

        $pdf->Cell(128.6, 5, '', 0, 0);
        $pdf->Cell(64.3, 5, '( Kotaro Petshop )', 0, 0);

        $pdf->Output('Rekap Penjualan Barang.pdf', 'I');
    }
}

/* End of file Omset.php */
