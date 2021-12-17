<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KategoriBuku extends Model
{
	protected $table                = 'kategori_buku';
	protected $primaryKey 			= 'id_kategori';
	protected $allowedFields        = ['slug', 'nama_kategori'];
}
