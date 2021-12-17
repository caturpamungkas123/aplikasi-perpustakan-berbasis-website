<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BukuHilangModel;
use App\Models\Admin\BukuPinjamModel;
use App\Models\Admin\BukuRusakModel;
use App\Models\Admin\HutangBukuModel;
use App\Models\Admin\PengunjungModel;

class Dashboard extends BaseController
{
	protected $pengunjung;
	protected $bukuRusak;
	protected $bukuHilang;
	protected $bukuPinjam;
	protected $hutangBuku;

	public function __construct()
	{
		$this->pengunjung = new PengunjungModel();
		$this->bukuRusak = new BukuRusakModel();
		$this->bukuHilang = new BukuHilangModel();
		$this->bukuPinjam = new BukuPinjamModel();
		$this->hutangBuku = new HutangBukuModel();
	}

	public function index()
	{
		$data = [
			'halaman' => 'Dashboard',
			'bukuRusak' => $this->bukuRusak->countAllResults(),
			'bukuHilang' => $this->bukuHilang->countAllResults(),
			'bukuPinjam' => $this->bukuPinjam->countAllResults(),
			'hutangBuku' => $this->hutangBuku->countAllResults(),
			'pengunjung' => $this->pengunjung->where(['tahun' => date('Y')])->find()[0]
		];
		return view('Admin/Dashboard', $data);
	}
}
