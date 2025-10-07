<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Transaksi extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transaksi';
	protected $primaryKey = 'id';
	public $timestamps = false;
	

	protected $guarded = [];

	

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'barang_id', 'id');
	}
	public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
	}
}
