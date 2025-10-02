<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Barang extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'barang';

	protected $guarded = [];

	

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
	}
}
