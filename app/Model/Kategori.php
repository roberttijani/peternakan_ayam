<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    
    protected $table='kategori';
    protected $fillable=['nama','harga','stok'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail')->withTrashed();
    }

    public function OrderDetail()
    {
    	return $this->hasMany('App\Model\OrderDetail')->withTrashed();
    }
}
