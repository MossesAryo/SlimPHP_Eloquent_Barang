<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Kategori extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kategori';

	protected $guarded = [];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori','id_kategori');
    }
}
