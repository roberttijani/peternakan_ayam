<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KandangDetail;
use App\Model\Kategori;
use App\Model\Order;
use App\Model\Pelanggan;
use App\Charts\OrderChart;
use App\Model\AyamCek;


class DashboardController extends Controller
{
    public function index()
    {
    	$order=Order::all();
    	$pelanggan=Pelanggan::all();
    	$kandang_detail=KandangDetail::where('status','diternak');
    	$ayamall=KandangDetail::all();
    	$kategoris=Kategori::all();
    	$cek=AyamCek::all();
    	return view('admin.dashboard.index',compact('kategoris','order','pelanggan','kandang_detail','cek','ayamall'));
    }
}
