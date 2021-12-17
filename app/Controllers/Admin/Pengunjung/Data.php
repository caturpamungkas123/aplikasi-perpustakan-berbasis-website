<?php

namespace App\Controllers\Admin\Pengunjung;

use App\Controllers\BaseController;
use App\Models\Admin\PengunjungModel;

class Data extends BaseController
{
	protected $pengunjung;
	public function __construct()
	{
		$this->pengunjung = new PengunjungModel();
	}

	public function index($yearh)
	{
		// statistik pengunjung
		$bulan = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
		$backUpData = ['januari' => 0, 'februari' => 0, 'maret' => 0, 'april' => 0, 'mei' => 0, 'juni' => 0, 'juli' => 0, 'agustus' => 0, 'september' => 0, 'oktober' => 0, 'november' => 0, 'desember' => 0];
		$month = $this->pengunjung->where(['tahun' => $yearh])->find();
		if ($month == null) {
			$dataPengunjung = $backUpData;
		} else {
			$dataPengunjung = $this->pengunjung->where(['tahun' => $yearh])->find()[0];
		}
		// rekap pengunjung

		$data = [
			'halaman' => 'Data Pengunjung',
			'bulan' => $bulan,
			'pengunjung' => $dataPengunjung,
			'rekap' => $this->pengunjung->findAll()
		];
		return view('admin/pengunjung/index', $data);
	}

	public function add($month)
	{
		if ($this->pengunjung->where(['tahun' => date('Y')])->countAllResults(false) > 0) {
			$this->pengunjung->updateColom(false, date('Y'), $month, $this->request->getPost('jumlah'));
		} else {
			$this->pengunjung->updateColom(true, date('Y'), $month, $this->request->getPost('jumlah'));
		}
		session()->setFlashdata('success', 'Data Berhasil Disimpan');
		return redirect()->to('/admin/pengunjung/data/index/' . date('Y') . '');
	}
}
