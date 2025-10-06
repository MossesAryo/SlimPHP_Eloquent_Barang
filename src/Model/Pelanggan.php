<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Pelanggan extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pelanggan';
	protected $primaryKey = 'id';

	protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id','pelanggan_id');
    }
}   
