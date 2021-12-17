<?php

namespace App\Controllers\Admin\Anggota;

use App\Controllers\BaseController;
use App\Models\Admin\AnggotaModel;
use App\Models\Admin\ProdiModel;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;

class Data extends BaseController
{
	protected $anggota;
	protected $prodi;
	public function __construct()
	{
		$this->anggota = new AnggotaModel();
		$this->prodi = new ProdiModel();
	}

	public function index()
	{
		$data = [
			'halaman' => 'Data Anggota Perpustakaan',
			'members' => $this->anggota->findAll()
		];
		return view('admin/anggota/index', $data);
	}
	public function add()
	{
		$data = [
			'prodi' => $this->prodi->findAll(),
			'halaman' => 'Tambah Anggota'
		];
		return view('admin/anggota/add', $data);
	}
	public function save()
	{
		// generate qrcode
		$generateQr = str_shuffle('1234567890abpqrstuvwxyzABCDEVWXYZ');

		$qrCode = new QrCode($generateQr);
		$qrCode->setSize(300);
		$qrCode->setMargin(10);

		// Set advanced options
		$qrCode->setWriterByName('png');
		$qrCode->setEncoding('UTF-8');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH());
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		$qrCode->setLogoPath(__DIR__ . '../../../../../vendor/endroid/qr-code/assets/images/symfony.png');
		$qrCode->setLogoSize(100, 100);
		$qrCode->setValidateResult(false);

		// Round block sizes to improve readability and make the blocks sharper in pixel based outputs (like png).
		// There are three approaches:
		$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_MARGIN); // The size of the qr code is shrinked, if necessary, but the size of the final image remains unchanged due to additional margin being added (default)
		$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_ENLARGE); // The size of the qr code and the final image is enlarged, if necessary
		$qrCode->setRoundBlockSize(true, QrCode::ROUND_BLOCK_SIZE_MODE_SHRINK); // The size of the qr code and the final image is shrinked, if necessary

		// Set additional writer options (SvgWriter example)
		$qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

		// Directly output the QR code
		header('Content-Type: ' . $qrCode->getContentType());

		// Save it to a file

		$qrCode->writeFile(__DIR__ . '../../../../../public/img/anggota/qrcode/' . $generateQr . '.png');
		// get file foto
		if ($this->request->getFile('foto')->getError() === 4) {
			$namePicture = 'default.png';
		} else {
			$filePicture = $this->request->getFile('foto');
			$namePicture = $filePicture->getRandomName();
			$filePicture->move('img/Anggota', $namePicture);
		}
		// save data
		$data = [
			'nama' => $this->request->getPost('nama'),
			'kelas' => strtoupper($this->request->getPost('kelas')),
			'nomer_pelajar' => $this->request->getPost('nomer_pelajar'),
			'foto' => $namePicture,
			'prodi' => $this->request->getPost('prodi'),
			'ttl' => $this->request->getPost('ttl'),
			'qrcode' => $generateQr
		];
		$this->anggota->save($data);
		session()->setFlashdata('success', 'Data Berhasil Disimpan');
		return redirect()->to('/admin/anggota/data');
	}

	public function update($id)
	{

		// cek gambar
		if ($this->request->getFile('foto')->getError() === 4) {
			$namePicture = $this->request->getPost('foto_lama');
		} else {
			// bila ganti gambar, hapus gambar lama dan ganti yang baru
			unlink('img/Anggota/' . $this->request->getPost('foto_lama') . '');
			$file = $this->request->getFile('foto');
			$namePicture = $file->getRandomName();
			$file->move('img/Anggota', $namePicture);
		}

		$data = [
			'id' => (int)$id,
			'nama' => $this->request->getPost('nama'),
			'kelas' => $this->request->getPost('kelas'),
			'nomer_pelajar' => $this->request->getPost('nomer_pelajar'),
			'foto' => $namePicture,
		];
		$this->anggota->save($data);
		session()->setFlashdata('success', 'Data Berhasil Diubah');
		return redirect()->to('/admin/anggota/data');
	}

	public function delete($id)
	{
		if ($this->anggota->find($id)['foto'] == 'default.png') {
			$this->anggota->delete($id);
		} else {
			unlink('img/Anggota/' . $this->anggota->find($id)['foto'] . '');
			$this->anggota->delete($id);
		}
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/admin/anggota/data');
	}
	public function download($id)
	{
		$data = $this->anggota->find($id);
		return $this->response->download(__DIR__ . '../../../../../public/img/anggota/qrcode/' . $data['qrcode'] . '.png', null)->setFileName('' . $data['nama'] . '.png');
	}
}
