<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kandang extends Model
{
	use SoftDeletes;
	
    protected $table= 'kandang';
    protected $fillable=['nama','kode'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail')->withTrashed();
    }
}
