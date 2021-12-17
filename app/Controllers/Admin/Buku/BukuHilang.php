<?php

namespace App\Controllers\Admin\Buku;

use App\Controllers\BaseController;
use App\Models\Admin\BukuHilangModel;

class BukuHilang extends BaseController
{
	protected $book;
	public function __construct()
	{
		$this->book = new BukuHilangModel();
	}

	public function index()
	{
		$data = [
			'halaman' => 'Data Buku Hilang',
			'books' => $this->book->findAll()
		];
		return view('admin/buku/hilang/index', $data);
	}

	public function add()
	{
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameRandom = 'default.png';
		} else {
			$file = $this->request->getFile('foto');
			$nameRandom = $file->getRandomName();
			$file->move('img/bukuHilang', $nameRandom);
		}

		$data = [
			'nama_buku' => $this->request->getVar('nama_buku'),
			'jumlah' => $this->request->getVar('jumlah'),
			'foto' => $nameRandom
		];
		$this->book->save($data);
		session()->setFlashdata('success', 'Data Berhasil Ditambah');
		return redirect()->to('/admin/buku/bukuhilang');
	}

	public function edit($id)
	{
		$data = [
			'halaman' => 'Edit Data Buku Hilang',
			'book' => $this->book->find($id)
		];
		return view('admin/buku/hilang/edit', $data);
	}

	public function update($id)
	{
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameFoto = $this->request->getVar('foto_lama');
		} else {
			unlink('img/bukuHilang/' . $this->request->getPost('foto_lama') . '');
			$file = $this->request->getFile('foto');
			$nameFoto = $file->getRandomName();
			$file->move('img/BukuHilang', $nameFoto);
		}
		$data = [
			'id' => (int)$id,
			'nama_buku' => $this->request->getVar('nama_buku'),
			'jumlah' => $this->request->getVar('jumlah'),
			'foto' => $nameFoto
		];
		$this->book->save($data);
		session()->setFlashdata('success', 'Data Berhasil Diubah');
		return redirect()->to('/admin/buku/BukuHilang');
	}

	public function delete($id)
	{
		$data = $this->book->find($id);
		if ($data['foto'] == 'default.png') {
			$this->book->delete($id);
		} else {
			unlink('img/BukuHilang/' . $data['foto'] . '');
			$this->book->delete($id);
		}
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/buku/BukuHilang');
	}
}
