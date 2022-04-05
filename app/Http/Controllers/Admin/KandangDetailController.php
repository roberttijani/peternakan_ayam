<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Kandang;
use App\Model\KandangDetail;
use App\Model\Kategori;
use App\Model\Suplier;
use RealRashid\SweetAlert\Facades\Alert;

class KandangDetailController extends Controller
{
	public function __construct ()
	{
		$this->model=new KandangDetail;
	}
    public function index()
    {
        $this->authorize('viewAny',$this->model);
    	$kandangdetails=$this->model->orderBy('created_at','desc')->get();
    	return view('admin.kandang_detail.index',compact('kandangdetails'));
    }

    public function create()
    {
        $this->authorize('create',$this->model);
    	$supliers=Suplier::all();
    	$kategoris=Kategori::all();
    	$kandangs=Kandang::where('status','kosong')->get();
    	return view('admin.kandang_detail.create',compact('supliers','kategoris','kandangs'));
    }

    public function store(Request $request)
    {
        $this->authorize('create',$this->model);
        $request->validate([
            'suplier_id'=>'required',
            'kategori_id'=>'required',
            'kandang_id'=>'required',
            'jumlah_awal'=>'required',
            'keterangan'=>'required',
        ]);
        // dd($request['kandang_id']);
        Kandang::where('id',$request['kandang_id'])->update(['status'=>'terpakai']);
    	$request->merge(['status'=>'diternak']);
    	$this->model->create($request->all());
        Alert::success('Bibit', 'Berhasil Tambah Bibit !');

    	return redirect()->route('kandang_detail.index');
    }

    public function edit(Request $request,$id)
    {
        $this->authorize('update',$this->model);
    	$supliers=Suplier::all();
    	$kategoris=Kategori::all();
    	$kandangs=Kandang::where('status','kosong')->get();
    	$kandangdetails=$this->model->find($id);

    	return view('admin.kandang_detail.edit',compact('supliers','kategoris','kandangs','kandangdetails'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('update',$this->model);
        $request->validate([
            'suplier_id'=>'required',
            'kategori_id'=>'required',
            'kandang_id'=>'required',
            'jumlah_awal'=>'required',
            'keterangan'=>'required',
        ]);
        
        $data=$this->model->find($id);
        $kategori=Kategori::find($data->kategori_id);

        if ($request->status == 'terpanen') {
            $kandang=Kandang::where('id',$data['kandang_id'])->update(['status'=>'kosong']);

            if ($data->jumlah_akhir == 0) {
                $data->update(['jumlah_akhir'=>$data->jumlah_awal]);
            }      
            $kategori->update(['stok'=>$kategori->stok+$data->jumlah_akhir]);

        }elseif ($request->status == 'diternak') {
            $kandang=Kandang::where('id',$request['kandang_id'])->update(['status'=>'terpakai']);
            $kategori->update(['stok'=>$kategori->stok-$data->jumlah_akhir]);
        }

        $data->update($request->all());
        Alert::success('Edit', 'Berhasil Edit !');

        return redirect()->route('kandang_detail.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete',$this->model);
        $data=$this->model->find($id);
        $kandang=Kandang::where('id',$data['kandang_id'])->update(['status'=>'kosong']);
        $data->delete();
        Alert::warning('Hapus', 'Data Berhasil Di hapus !');
        return redirect()->back();
    }

    public function panen($id)
    {
        $this->authorize('update',$this->model);
        $data=$this->model->find($id);
        $data->update(['status'=>'terpanen']);
        $kategori=Kategori::find($data->kategori_id);

        if ($data->jumlah_akhir == null) {
                $data->update(['jumlah_akhir'=>$data->jumlah_awal]);
        }

        // dd($data->jumlah_akhir);

        $kategori->update(['stok'=>$kategori->stok+$data->jumlah_akhir]);
        Kandang::where('id',$data['kandang_id'])->update(['status'=>'kosong']);
 
        Alert::success('Panen', 'Terpanen !');
        return redirect()->back();


    }
}
