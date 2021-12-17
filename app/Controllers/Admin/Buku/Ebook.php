<?php

namespace App\Controllers\Admin\Buku;

use App\Controllers\BaseController;
use App\Models\Admin\EbookModel;

class Ebook extends BaseController
{
	protected $ebook;
	public function __construct()
	{
		$this->ebook = new EbookModel();
	}

	public function index($id = null)
	{
		if ($id) {
			$data = [
				'halaman' => "Edit Data Ebook",
				'ebook' => $this->ebook->getData($id)
			];
			return view('admin/buku/ebook/edit', $data);
		} else {
			$kategori = new \App\Models\Admin\KategoriBuku();
			$prodi = new \App\Models\Admin\ProdiModel();
			$data = [
				'halaman' => 'Ebook',
				'ebook' => $this->ebook->getData(),
				'kategori' => $kategori->findAll(),
				'prodi' => $prodi->findAll()
			];
			return view('admin/buku/ebook/index', $data);
		}
	}

	public function add()
	{
		$kategori = new \App\Models\Admin\KategoriBuku();
		$prodi = new \App\Models\Admin\ProdiModel();
		$data = [
			'halaman' => 'Tambah Ebook',
			'kategori' => $kategori->findAll(),
			'prodi' => $prodi->findAll()
		];
		return  view('admin/buku/ebook/add', $data);
	}

	public function save()
	{
		// sampul
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameSampul = 'default.png';
		} else {
			$sampul = $this->request->getFile('foto');
			$nameSampul = '' . str_shuffle('12345abcdesfABCDEFG') . '.png';
			$sampul->move('img/ebook', $nameSampul);
		}
		//file pdf
		$file = $this->request->getFile('file_ebook');
		$fileName = '' . str_shuffle('12345abcdsfABCDEFG') . '.pdf';
		$file->move('pdf/ebook', $fileName);

		$data = [
			'nama' => $this->request->getPost('nama'),
			'kategori' => (int)$this->request->getPost('kategori'),
			'prodi' => (int) $this->request->getPost('kategori'),
			'deskripsi' => $this->request->getPost('deskripsi'),
			'foto' => $nameSampul,
			'pengapu' => $this->request->getPost('pengapu'),
			'file' => $fileName
		];
		$this->ebook->save($data);
		session()->setFlashdata('success', 'Data Berhasil Disimpan');
		return redirect()->to('/admin/buku/ebook/index');
	}

	public function update($id)
	{
		// cek file sampul
		if ($this->request->getFile('foto')->getError() === 4) {
			$nameSampul = $this->request->getPost('foto_lama');
		} else {
			if ($this->request->getPost('foto_lama') !== 'default.png') {
				unlink('img/ebook/' . $this->request->getGetPost('foto_lama') . '');
			}
			$foto = $this->request->getFile('foto');
			$nameSampul = '' . str_shuffle('123456askdfjSJKFDBASJK') . '.png';
			$foto->move('img/ebook', $nameSampul);
		}
		// cek file pdf
		if ($this->request->getFile('file_ebook')->getError() === 4) {
			$nameEbook = $this->request->getPost('file_ebook_lama');
		} else {
			unlink('pdf/ebook/' . $this->request->getPost('file_ebook_lama') . '');
			$fileEbook = $this->request->getFile('file_ebook');
			$nameEbook = '' . str_shuffle('345345sdjfhdjnvJKSDAFBSDJDFB') . '.pdf';
			$fileEbook->move('pdf/ebook', $nameEbook);
		}
		// tanggkap data yang dikirim
		$data = [
			'id' => (int)$id,
			'nama' => $this->request->getPost('nama'),
			'kategori' => (int)$this->request->getPost('kategori'),
			'prodi' => (int) $this->request->getPost('kategori'),
			'foto' => $nameSampul,
			'file' => $nameEbook,
			'deskripsi' => $this->request->getPost('deskripsi'),
			'pengapu' => $this->request->getPost('pengapu')
		];
		$this->ebook->save($data);
		session()->setFlashdata('success', 'Data Berhasil Diubah');
		return redirect()->to('/admin/buku/ebook/index');
	}

	public function getPdf($id)
	{
		$ebook = $this->ebook->find($id);
		$this->response->setContentType('application/pdf');
		$path = __DIR__ . '../../../../../public/pdf/ebook/' . $ebook['file'] . '';
		readfile($path);
	}
}
