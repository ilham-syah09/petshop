<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Front extends CI_Model
{
	public function getKategori()
	{
		$this->db->order_by('kategori', 'asc');

		return $this->db->get('kategori')->result();
	}

	public function getPopularProducts()
	{
		$this->db->select('SUM(keranjang.total) as total, barang.id, barang.nama_barang, barang.harga, barang.stok');
		$this->db->join('barang', 'barang.id = keranjang.idBarang', 'inner');

		$this->db->group_by('keranjang.idBarang');
		$this->db->order_by('total', 'desc');

		return $this->db->get('keranjang', 8)->result();
	}

	public function getProductKategori()
	{
		$this->db->select('kategori.id, kategori.kategori, COUNT(barang.id) as total, barang.id as idBarang');
		$this->db->join('barang', 'barang.kategori_id = kategori.id', 'inner');

		$this->db->group_by('barang.kategori_id');
		$this->db->order_by('kategori.kategori', 'asc');

		return $this->db->get('kategori', 8)->result();
	}

	public function getProduct($where)
	{
		$this->db->where($where);
		return $this->db->get('barang')->row();
	}

	public function getGambar($where)
	{
		$this->db->where($where);
		$this->db->order_by('createdAt', 'desc');

		return $this->db->get('gambar')->result();
	}

	public function getProductRandom($where = null, $jumlah = 6)
	{
		if ($where) {
			$this->db->where($where);
		}

		$this->db->order_by('nama_barang', 'RANDOM');

		return $this->db->get('barang', $jumlah)->result();
	}

	public function getProductsShop($where, $limit = null, $offset = null)
	{
		$this->db->where($where);

		return $this->db->get('barang', $limit, $offset)->result();
	}

	public function getCountProduct($where)
	{
		$this->db->where($where);

		return $this->db->get('barang')->num_rows();
	}

	public function checkCart($where)
	{
		$this->db->where($where);

		return $this->db->get('keranjang')->row();
	}

	public function getBarang($where)
	{
		$this->db->where($where);
		return $this->db->get('barang')->row();
	}

	public function getCart($where)
	{
		$this->db->select('barang.nama_barang, barang.harga, barang.stok, keranjang.*');
		$this->db->join('barang', 'barang.id = keranjang.idBarang', 'inner');

		$this->db->where($where);
		return $this->db->get('keranjang')->result();
	}

	public function getTotalPrice($where)
	{
		$this->db->select('SUM(barang.harga * keranjang.total) AS total');
		$this->db->join('barang', 'barang.id = keranjang.idBarang', 'inner');

		$this->db->where($where);
		return $this->db->get('keranjang')->row();
	}

	public function getListOrders($where)
	{
		if ($where) {
			$this->db->where($where);
		}

		$this->db->group_by('idKhusus,');
		$this->db->order_by('createdAt', 'desc');

		return $this->db->get('orders')->result();
	}

	public function getListProduct($where)
	{
		$this->db->select('barang.nama_barang, barang.harga, keranjang.idBarang, keranjang.total, orders.idKhusus, orders.statusPembayaran, orders.createdAt, orders.metodePembayaran, orders.buktiPembayaran, ongkir.kecamatan, ongkir.harga as ongkir');
		$this->db->join('keranjang', 'keranjang.id = orders.idKeranjang', 'inner');
		$this->db->join('barang', 'barang.id = keranjang.idBarang', 'inner');
		$this->db->join('ongkir', 'ongkir.id = orders.idOngkir', 'left');

		$this->db->where($where);

		$this->db->order_by('barang.nama_barang', 'asc');

		return $this->db->get('orders')->result();
	}

	public function getListProgres($where)
	{
		$this->db->where($where);
		$this->db->order_by('createdAt', 'desc');

		return $this->db->get('progres')->result();
	}

	public function getReview($where)
	{
		$this->db->select('review.*, user.name, user.image');
		$this->db->join('user', 'user.id = review.idUser', 'inner');

		$this->db->where($where);
		$this->db->order_by('review.createdAt', 'desc');

		return $this->db->get('review')->result();
	}

	public function getRating($where)
	{
		$this->db->select('AVG(rating) as rating, COUNT(id) as total');
		$this->db->where($where);

		return $this->db->get('review')->row();
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
}

/* End of file M_Front.php */
