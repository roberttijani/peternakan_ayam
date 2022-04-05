<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
	use SoftDeletes;
    protected $table='pelanggan';

    protected $fillable=['nama','no_hp','alamat'];

    public function Order()
    {
    	return $this->hasMany(Order::class)->withTrashed();
    }
}
