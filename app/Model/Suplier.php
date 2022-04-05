<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Suplier extends Model
{
	use Notifiable,SoftDeletes;

    protected $table='suplier';
    protected $fillable=['nama','no_hp','alamat'];

    public function KandangDetail()
    {
    	return $this->hasMany('App\Model\KandangDetail')->withTrashed();
    }
}
