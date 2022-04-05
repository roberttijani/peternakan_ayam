<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AyamCek extends Model
{
    protected $table= 'ayam_cek';
    protected $fillable=['user_id','kandang_detail_id','ayam_mati','ayam_sakit'];

    public function User()
    {
    	return $this->belongsTo('App\Model\User')->withTrashed();
    }

    public function KandangDetail()
    {
    	return $this->belongsTo('App\Model\KandangDetail')->withTrashed();
    }
}
