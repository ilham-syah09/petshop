<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
    public function getTotalPemasukan()
    {
        $this->db->select('idKhusus, totalBiaya');

        $this->db->group_by('idKhusus');

        $data = $this->db->get('orders')->result();
        $total = 0;

        if ($data) {
            foreach ($data as $dt) {
                $total += $dt->totalBiaya;
            }
        }

        return $total;
    }
    public function getAllUser()
    {
        $this->db->where('role', 2);
        return $this->db->get('user')->result();
    }

    public function getCountUser()
    {
        $this->db->where('role', 2);
        return $this->db->get('user')->num_rows();
    }

    public function getCountMenu()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function getCountOrders()
    {
        $this->db->group_by('idKhusus');

        return $this->db->get('orders')->num_rows();
    }

    public function getKategori()
    {
        $this->db->order_by('kategori', 'asc');
        return $this->db->get('kategori')->result();
    }

    public function getBarang()
    {
        $this->db->select('barang.*, kategori.kategori');
        $this->db->join('kategori', 'barang.kategori_id = kategori.id', 'inner');

        $this->db->order_by('barang.createdAt', 'desc');

        return $this->db->get('barang')->result();
    }

    public function getPesanan($where = null)
    {
        $this->db->select('orders.*, user.name, user.noHp');
        $this->db->join('user', 'user.id = orders.idUser', 'inner');

        if ($where) {
            $this->db->where($where);
        }

        $this->db->group_by('orders.idKhusus, orders.idUser');
        $this->db->order_by('orders.createdAt', 'desc');

        return $this->db->get('orders')->result();
    }

    public function getListPesanan($where)
    {
        $this->db->select('barang.nama_barang, barang.harga, keranjang.total, orders.idKhusus, orders.statusPembayaran, orders.createdAt, orders.metodePembayaran, orders.buktiPembayaran, user.name, user.noHp, ongkir.kecamatan, ongkir.harga as ongkir');
        $this->db->join('user', 'user.id = orders.idUser', 'inner');
        $this->db->join('keranjang', 'keranjang.id = orders.idKeranjang', 'inner');
        $this->db->join('barang', 'barang.id = keranjang.idBarang', 'inner');
        $this->db->join('ongkir', 'ongkir.id = orders.idOngkir', 'left');

        $this->db->where($where);

        $this->db->order_by('barang.nama_barang', 'asc');

        return $this->db->get('orders')->result();
    }

    public function cekProgres($where)
    {
        $this->db->where($where);

        return $this->db->get('progres')->row();
    }

    public function getListGambar($where)
    {
        $this->db->where($where);
        $this->db->order_by('createdAt', 'desc');

        return $this->db->get('gambar')->result();
    }

    public function getListProgres($where)
    {
        $this->db->where($where);
        $this->db->order_by('createdAt', 'desc');

        return $this->db->get('progres')->result();
    }

    public function getTahunIni()
    {
        $this->db->select('YEAR(createdAt) as tahun');
        $this->db->order_by('tahun', 'desc');
        $this->db->limit(1);

        $data = $this->db->get('orders')->row();

        if ($data) {
            return $data->tahun;
        } else {
            return date('Y');
        }
    }

    public function getBulanIni($tahun)
    {
        $this->db->select('MONTH(createdAt) as bulan');
        $this->db->where('YEAR(createdAt)', $tahun);

        $this->db->order_by('bulan', 'desc');
        $this->db->limit(1);

        $data = $this->db->get('orders')->row();
        if ($data) {
            return $data->bulan;
        } else {
            return date('m');
        }
    }

    public function getTahun()
    {
        $this->db->select('YEAR(createdAt) as tahun');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'desc');

        return $this->db->get('orders')->result();
    }

    public function getPesanMasuk()
    {
        $this->db->order_by('createdAt', 'desc');

        return $this->db->get('pesan')->result();
    }

    public function getOngkir()
    {
        $this->db->order_by('kecamatan', 'asc');

        return $this->db->get('ongkir')->result();
    }

    public function getPaket()
    {
        $this->db->order_by('namaPaket', 'asc');

        return $this->db->get('paket')->result();
    }

    public function getGrooming($where = null)
    {
        $this->db->select('grooming.*, paket.namaPaket, paket.harga, user.name, ongkir.kecamatan, ongkir.harga as ongkir');
        $this->db->join('paket', 'paket.id = grooming.idPaket', 'inner');
        $this->db->join('user', 'user.id = grooming.idUser', 'inner');
        $this->db->join('ongkir', 'ongkir.id = grooming.idOngkir', 'left');

        if ($where) {
            $this->db->where($where);
        }

        $this->db->order_by('grooming.createdAt', 'desc');

        return $this->db->get('grooming')->result();
    }

    public function getLaporanPenjualan($where)
    {
        $this->db->select('keranjang.idBarang, orders.createdAt, barang.nama_barang, COUNT(barang.nama_barang) as jumlah');
        $this->db->from('orders');
        $this->db->join('keranjang', 'orders.idKeranjang = keranjang.id', 'inner');
        $this->db->join('barang', 'keranjang.idBarang = barang.id', 'left');
        $this->db->where($where);
        $this->db->group_by('keranjang.idBarang, orders.createdAt, barang.nama_barang');
        return $this->db->get()->result();
    }
}

/* End of file M_Admin.php */
