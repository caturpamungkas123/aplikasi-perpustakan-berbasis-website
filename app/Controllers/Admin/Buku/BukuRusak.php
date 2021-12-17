<?php

namespace App\Controllers\Admin\Buku;

use App\Controllers\BaseController;
use App\Models\Admin\KategoriBuku;
use App\Models\Admin\BukuRusakModel;

class BukuRusak extends BaseController
{
	protected $kategori;
	protected $bukuRusak;
	public function __construct()
	{
		$this->kategori = new KategoriBuku();
		$this->bukuRusak = new BukuRusakModel();
	}
	public function index()
	{
		$data = [
			'halaman' => 'Data Buku Rusak',
			'books' => $this->bukuRusak->getData(),
			'kategori' => $this->kategori->findAll()
		];
		return view('admin/buku/rusak/buku__rusak', $data);
	}
	public function add()
	{
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameRandom = 'default.png';
		} else {
			$fileFoto = $this->request->getFile('foto');
			$nameRandom = $fileFoto->getRandomName();
			$fileFoto->move('img/BukuRusak', $nameRandom);
		}
		$data = [
			'nama_buku' => $this->request->getVar('nama_buku'),
			'jumlah' => $this->request->getVar('jumlah_buku'),
			'id_kategori' => (int)$this->request->getVar('id_ketegori'),
			'foto' => $nameRandom
		];
		$this->bukuRusak->save($data);
		session()->setFlashdata('success', 'Data Berhasil Ditambah');
		return redirect()->to('/admin/buku/bukurusak/index');
	}
	public function edit($id)
	{
		$data = [
			'halaman' => 'Edit Data Buku Rusak',
			'kategori' => $this->kategori->findAll(),
			'books' => $this->bukuRusak->getData($id)
		];
		return view('admin/buku/rusak/edit__buku__rusak', $data);
	}
	public function update($id)
	{
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameFoto = $this->request->getVar('foto_lama');
		} else {
			if ($this->request->getPost('foto_lama') !== 'default.png') {
				unlink('img/BukuRusak/' . $this->request->getVar('foto_lama') . '');
			}
			$fileFoto = $this->request->getFile('foto');
			$nameFoto = $fileFoto->getRandomName();
			$fileFoto->move('img/BukuRusak', $nameFoto);
		}
		//  update
		$data = [
			'id' => $id,
			'nama_buku' => $this->request->getVar('nama_buku'),
			'id_kategori' => $this->request->getVar('id_kategori'),
			'jumlah' => $this->request->getVar('jumlah'),
			'foto' => $nameFoto
		];
		$this->bukuRusak->save($data);
		session()->setFlashdata('success', 'Data Berhasil Diubah');
		return redirect()->to('/admin/buku/bukurusak');
	}
	public function hapus($id)
	{
		$data = $this->bukuRusak->find($id);
		if ($data['foto'] == 'default.png') {
			$this->bukuRusak->delete($id);
		} else {
			unlink('img/BukuRusak/' . $data['foto'] . '');
			$this->bukuRusak->delete($id);
		}
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/buku/bukurusak');
	}
}
