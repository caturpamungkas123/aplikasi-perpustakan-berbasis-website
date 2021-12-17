<?php

namespace App\Controllers\Admin;

use App\Controllers\Admin\Pengaturan\Kategori;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Admin\AnggotaModel;
use App\Models\Admin\EbookModel;
use App\Models\Admin\KategoriBuku;
use App\Models\Admin\ProdiModel;
use CodeIgniter\API\ResponseTrait;
use Faker\Documentor;

class Api extends ResourceController
{
	use ResponseTrait;
	// qr code
	public function show($id = null)
	{
		$anggota = new AnggotaModel();

		return $this->respond($anggota->qrcode($id));
	}
	// ebook
	public function ebook($id)
	{
		$ebook = new EbookModel();
		return $this->respond($ebook->getData($id));
	}
	public function downloadEbook($id)
	{
		$ebooks = new EbookModel();
		$ebook = $ebooks->find($id);
		return $this->response->download(__DIR__ . '../../../../public/pdf/ebook/' . $ebook['file'] . '', null)->setFileName('' . $ebook['nama'] . '.pdf');
	}
	public function update($id = null)
	{
		$ebook = new EbookModel();
		return $this->respond($ebook->getData($id));
	}

	// prodi
	public function Prodi($id = null)
	{
		$prodi = new ProdiModel();
		if ($id) {
			return $this->respond($prodi->find($id));
		} else {
			$data = [
				'nama_prodi' => $this->request->getVar('nama_prodi')
			];
			$prodi->insert($data);
			$respons = [
				'status' => 201,
				'error' => null,
				'message' => 'Data berhasil ditambah'
			];
			return $this->respondCreated($respons);
		}
	}
	public function deleteProdi($id)
	{
		$prodi = new ProdiModel();
		return $this->respond($prodi->delete($id));
	}
	public function updateProdi($id)
	{
		$prodi = new ProdiModel();
		$data = ['nama_prodi' => $this->request->getVar('nama_prodi')];
		$prodi->update($id, $data);
		$respons = [
			'status' => 200,
			'error' => null,
			'message' => 'Data Berhasil Diubah'
		];
		return $this->respondUpdated($respons);
	}

	//kategori
	public function kategori($id)
	{
		$kategori = new KategoriBuku();
		return $this->respond($kategori->find($id));
	}
	public function updateKategori($id)
	{
		$kategori = new KategoriBuku();
		$data = [
			'nama_kategori' => $this->request->getVar('nama_kategori')
		];
		$kategori->update($id, $data);
		$res = [
			'status' => 200,
			'error' => null,
			'message' => 'Data Berhasil Diubah'
		];
		return $this->respondUpdated($res);
	}
	public function saveKategori()
	{
		$kategori = new KategoriBuku();
		$data = [
			'nama_kategori' => $this->request->getVar('nama_kategori')
		];
		$kategori->insert($data);
		$res = [
			'status' => 201,
			'error' => null,
			'message' => 'Data Berhasil Ditambahkan'
		];
		return $this->respondCreated($res);
	}
	public function deleteKategori($id)
	{
		$kategori = new KategoriBuku();
		$kategori->delete($id);
		$res = [
			'status' => 200,
			'error' => null,
			'message' => 'Data Berhasil Dihapus'
		];
		return $this->respondDeleted($res);
	}
}
