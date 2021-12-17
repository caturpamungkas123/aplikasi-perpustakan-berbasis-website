<?php

namespace App\Controllers\Admin\Buku;

use App\Controllers\BaseController;
use App\Models\Admin\BukuPinjamModel;

class BukuPinjam extends BaseController
{
    protected $bukuPinjam;
    public function __construct()
    {
        $this->bukuPinjam = new BukuPinjamModel();
    }
    public function index()
    {
        $data = [
            'halaman' => 'Data Buku Dipinjam',
            'books' => $this->bukuPinjam->findAll()
        ];
        return view('admin/buku/pinjam/buku__pinjam', $data);
    }
    public function add()
    {
        $data = [
            'nama_buku' => $this->request->getVar('nama_buku'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'kondisi' => $this->request->getVar('kondisi'),
            'nomer_siswa' => $this->request->getVar('nomer_siswa'),
            'kelas' => strtoupper($this->request->getVar('kelas')),
            'kembali' => $this->request->getVar('kembali'),
            'meminjam' => date('Y-m-d')
        ];
        $this->bukuPinjam->save($data);
        session()->setFlashdata('success', 'Data Berhasil Ditambah');
        return redirect()->to('/admin/buku/bukupinjam');
    }

    public function edit($id)
    {
        $data = [
            'halaman' => 'Edit Data Pinjam',
            'book' => $this->bukuPinjam->find($id)
        ];
        return view('admin/buku/pinjam/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => (int) $id,
            'nama_buku' => $this->request->getVar('nama_buku'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'kondisi' => $this->request->getVar('kondisi'),
            'nomer_siswa' => $this->request->getVar('nomer_siswa'),
            'kelas' => strtoupper($this->request->getVar('kelas')),
            'kembali' => $this->request->getVar('kembali'),
        ];
        $this->bukuPinjam->save($data);
        session()->setFlashdata('success', 'Data Berhasil Diubah');
        return redirect()->to('/admin/buku/bukupinjam');
    }

    public function hapus($id)
    {
        $this->bukuPinjam->delete($id);
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/buku/bukupinjam');
    }
}
