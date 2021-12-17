<?php

namespace App\Controllers\Admin\Buku;

use App\Controllers\BaseController;
use App\Models\Admin\HutangBukuModel;

class HutangBuku extends BaseController
{
	protected $hutang;
	public function __construct()
	{
		$this->hutang = new HutangBukuModel();
	}

	public function index()
	{
		$data = [
			'halaman' => 'Data Hutang Buku',
			'data' => $this->hutang->findAll()
		];
		return view('admin/buku/hutang/index', $data);
	}

	public function add()
	{
		$data = [
			'nama_siswa' => $this->request->getPost('nama_siswa'),
			'nama_buku' => $this->request->getPost('nama_buku'),
			'jumlah' => (int)$this->request->getPost('jumlah'),
			'tempo' => $this->request->getPost('tempo'),
			'kelas' => strtoupper($this->request->getPost('kelas'))
		];
		$this->hutang->save($data);
		session()->setFlashdata('success', 'Data Berhasil Ditambah');
		return redirect()->to('/admin/buku/HutangBuku');
	}

	public function edit($id)
	{
		$data = [
			'halaman' => 'Edit Data Hutang Buku',
			'data' => $this->hutang->find($id)
		];
		return view('admin/buku/hutang/edit', $data);
	}

	public function update($id)
	{
		$data = [
			'id' => (int)$id,
			'nama_siswa' => $this->request->getPost('nama_siswa'),
			'nama_buku' => $this->request->getPost('nama_buku'),
			'jumlah' => $this->request->getPost('jumlah'),
			'kelas' => $this->request->getPost('kelas'),
			'tempo' => $this->request->getPost('tempo')
		];
		$this->hutang->save($data);
		session()->setFlashdata('success', 'Data Berhasil Diubah');
		return redirect()->to('/admin/buku/HutangBuku');
	}

	public function delete($id)
	{
		$this->hutang->delete($id);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/buku/HutangBuku');
	}
}
