<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Controllers\BaseController;
use App\Models\Admin\KategoriBuku;

class Kategori extends BaseController
{
	protected $kategori;
	public function __construct()
	{
		$this->kategori = new KategoriBuku();
	}
	public function index()
	{
		$data = [
			'kategori' => $this->kategori->findAll(),
			'halaman' => 'Pengaturan Kategori Buku'
		];
		return view('admin/pengaturan/kategori/index', $data);
	}
}
