<?php

namespace App\Controllers\Admin\Pengaturan;

use App\Controllers\BaseController;
use App\Models\Admin\ProdiModel;

class Prodi extends BaseController
{
	protected $prodi;
	public function __construct()
	{
		$this->prodi = new ProdiModel();
	}
	public function index()
	{
		$data = [
			'halaman' => 'Pengaturan Prodi',
			'prodi' => $this->prodi->findAll(),
			'validate' => \Config\Services::validation()
		];

		return view('admin/pengaturan/prodi/index', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'nama_prodi' => [
				'rules' => 'is_unique[prodi.nama_prodi]',
				'errors' => [
					'is_unique' => 'Data Sudah terdaftar'
				]
			]
		])) {
			return redirect()->to('/admin/pengaturan/prodi/index')->withInput();
		} else {
			$data = ['nama_prodi' => $this->request->getPost('nama_prodi')];
			dd($data);
		}
	}

	public function delete($id)
	{
		$this->prodi->delete($id);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/pengaturan/prodi');
	}
}
