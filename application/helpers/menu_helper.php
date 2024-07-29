<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

function gambar($idBarang)
{
	$CI = &get_instance();

	$CI->db->where('idBarang', $idBarang);

	$CI->db->order_by('gambar', 'RANDOM');
	$data = $CI->db->get('gambar')->row();

	if ($data) {
		return $data->gambar;
	} else {
		return '';
	}
}

function getRating($idBarang)
{
	$CI = &get_instance();
	$CI->load->model('M_Front', 'front');

	$rating = $CI->front->getRating([
		'idBarang' => $idBarang
	]);

	if ($rating) {
		$rating = [
			'rating' => round($rating->rating, 1),
			'total'  => $rating->total
		];

		return $rating;
	} else {
		return false;
	}
}

function hari($hari)
{
	if ($hari == 1) {
		$hari = "Senin";
	} else if ($hari == 2) {
		$hari = "Selasa";
	} else if ($hari == 3) {
		$hari = "Rabu";
	} else if ($hari == 4) {
		$hari = "Kamis";
	} else if ($hari == 5) {
		$hari = "Jum'at";
	} else if ($hari == 6) {
		$hari = "Sabtu";
	} else if ($hari == 7) {
		$hari = "Ahad";
	}
	return $hari;
}

function bulan($bulan)
{
	switch ($bulan) {
		case 1:
			$bulan = "Januari";
			break;
		case 2:
			$bulan = "Februari";
			break;
		case 3:
			$bulan = "Maret";
			break;
		case 4:
			$bulan = "April";
			break;
		case 5:
			$bulan = "Mei";
			break;
		case 6:
			$bulan = "Juni";
			break;
		case 7:
			$bulan = "Juli";
			break;
		case 8:
			$bulan = "Agustus";
			break;
		case 9:
			$bulan = "September";
			break;
		case 10:
			$bulan = "Oktober";
			break;
		case 11:
			$bulan = "November";
			break;
		case 12:
			$bulan = "Desember";
			break;

		default:
			$bulan = Date('F');
			break;
	}
	return $bulan;
}

function tglIndo($date)
{
	$days = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
	$months = array(
		1 => 'Januari',
		2 => 'Februari',
		3 => 'Maret',
		4 => 'April',
		5 => 'Mei',
		6 => 'Juni',
		7 => 'Juli',
		8 => 'Agustus',
		9 => 'September',
		10 => 'Oktober',
		11 => 'November',
		12 => 'Desember'
	);

	$dayOfWeek = date('w', strtotime($date));
	$day = date('d', strtotime($date));
	$month = date('n', strtotime($date));
	$year = date('Y', strtotime($date));

	return $days[$dayOfWeek] . ', ' . $day . ' ' . $months[$month] . ' ' . $year;
}
