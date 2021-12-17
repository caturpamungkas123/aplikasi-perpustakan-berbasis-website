<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class EbookModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ebook';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama', 'deskripsi', 'pengapu', 'file', 'foto', 'kategori', 'prodi'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function getData($id = null)
	{
		if ($id) return $this->table('ebook')->join('kategori_buku', 'kategori_buku.id_kategori = ebook.kategori')->join('prodi', 'prodi.id_prodi = ebook.prodi')->find($id);
		return $this->table('ebook')
			->join('kategori_buku', 'kategori_buku.id_kategori = ebook.kategori')
			->join('prodi', 'prodi.id_prodi = ebook.prodi')
			->findAll();
	}
}
