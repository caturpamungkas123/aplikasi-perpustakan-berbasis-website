<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class BukuRusakModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'buku_rusak';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['nama_buku', 'jumlah', 'foto', 'id_kategori'];

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
		if ($id) return $this->table('buku_rusak')->join('kategori_buku', 'kategori_buku.id_kategori = buku_rusak.id_kategori')->find($id);
		return $this->table('buku_rusak')->join('kategori_buku', 'kategori_buku.id_kategori = buku_rusak.id_kategori')->findAll();
	}
}
