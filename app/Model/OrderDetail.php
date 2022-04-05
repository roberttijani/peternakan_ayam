<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;
    
    protected $table='order_detail';
    protected $fillable=['order_id','kategori_id','harga','qty','sub_total'];
    protected $dates = ['expired_at'];
    
    public function Order()
    {
    	return $this->belogsTo('App\Model\Order')->withTrashed();
    }

    public function Kategori()
    {
    	return $this->belongsTo('App\Model\Kategori')->withTrashed();
    }


}
