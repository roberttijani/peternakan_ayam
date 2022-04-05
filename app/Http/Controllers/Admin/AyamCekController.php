<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\AyamCek;
use App\Model\KandangDetail;
use RealRashid\SweetAlert\Facades\Alert;

class AyamCekController extends Controller
{
	public function __construct()
	{
		$this->model=new AyamCek;
	}

    public function index()
    {
        $this->authorize('viewAny',$this->model);
    	$ayamceks=$this->model->orderBy('created_at','desc')->get();
    	return view('admin.ayamcek.index',compact('ayamceks'));
    }

    public function create()
    {
        $this->authorize('create',$this->model);
    	$kandangdetails=KandangDetail::where('status','diternak')->get();
    	return view('admin.ayamcek.create',compact('kandangdetails'));
    }

    public function store (Request $request)
    {
        $this->authorize('create',$this->model);
        $request->validate([
            'kandang_detail_id'=>'required',
            'ayam_mati'=>'required|min:0',
            'ayam_sakit'=>'required|min:0',
        ]);

        $sum=$request->ayam_mati+$request->ayam_sakit;
        $data_kd=KandangDetail::find($request->kandang_detail_id);
   

        $sum=$request->ayam_mati+$request->ayam_sakit;

        if (empty($data_kd->jumlah_akhir)) {
            $final=$data_kd->jumlah_awal-($sum);
            $data_kd->update(['jumlah_akhir'=>$final]);
        }else{
            $final=$data_kd->jumlah_akhir-($sum);
            $data_kd->update(['jumlah_akhir'=>$final]);
        }

    	$request->merge(['user_id'=>auth()->user()->id]);
    	// dd($request);
    	$this->model->create($request->all());
        Alert::success('Cek AYam', 'Berhasil Tambah Data !');
    	return redirect()->route('ayam_cek.index');

    }

    public function edit($id)
    {
        $this->authorize('update',$this->model);
        $ayamcek=$this->model->find($id);
        return view('admin.ayamcek.edit',compact('ayamcek'));
    }

    public function update(Request $request , $id)
    {
        $this->authorize('update',$this->model);
        $request->validate([
            'ayam_mati'=>'required|min:0',
            'ayam_sakit'=>'required|min:0',
        ]);
        
        $data=$this->model->find($id);
        
        $sum_old=$data->ayam_mati+$data->ayam_sakit;
        $sum_new=$request->ayam_mati+$request->ayam_sakit;
        $data_kd=KandangDetail::find($data->kandang_detail_id);
        
        // dd($sum_old);

        if ($sum_old > $sum_new) {
            $sisa=$sum_old-$sum_new;
            // dd('lebih gede'.'='.$sisa);
            $final=$data_kd->jumlah_akhir + $sisa;
            // dd('lebih gede'.'='.$final);
            $data_kd->update(['jumlah_akhir'=>$final]);
        }else{
            // dd('lebih kecil');
            $sisa=$sum_new-$sum_old;
            // dd('lebih kecil'.'='.$sisa);
            $final=$data_kd->jumlah_akhir - $sisa;
            // dd('lebih kecil'.'='.$final);
            $data_kd->update(['jumlah_akhir'=>$final]);
        }

        $data->update($request->all());
        Alert::success('Cek AYam', 'Berhasil Edit Data !');
        return redirect()->route('ayam_cek.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete',$this->model);
        $this->model->find($id)->delete();
        Alert::warning('Cek AYam', 'Berhasil Hapus Data !');
        return redirect()->route('ayam_cek.index');
    }
}
