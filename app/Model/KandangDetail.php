<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class KandangDetail extends Model
{
    use Notifiable,SoftDeletes;

    protected $table='kandang_detail';
    protected $fillable=['suplier_id','kategori_id','kandang_id','jumlah_awal','jumlah_akhir','keterangan','status'];

    public function Suplier()
    {
    	return $this->belongsTo('App\Model\Suplier')->withTrashed();
    }

    public function Kandang()
    {
    	return $this->belongsTo('App\Model\Kandang')->withTrashed();
    }

    public function Kategori()
    {
    	return $this->belongsTo('App\Model\Kategori')->withTrashed();
    }

    public function AyamCek()
    {
        return $this->hasMany('App\Model\AyamCek')->withTrashed();
    }
}
