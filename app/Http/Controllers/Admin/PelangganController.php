<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pelanggan;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function __construct()
    {
    	$this->model=new Pelanggan;
    }

    public function index()
    {
        $this->authorize('viewAny',$this->model);
    	$pelanggans=$this->model->orderBy('id','desc')->get();
    	return view('admin.pelanggan.index',compact('pelanggans'));
    }

    public function create()
    {
    	return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'nama'=>'required',
    		'no_hp'=>'required',
    		'alamat'=>'required',
    	]);

    	$this->model->create($request->all());
        Alert::success('Pelanggan', 'Berhasil Tambah Pelanggan !');
    	return redirect()->route('pelanggan.index');
    }

    public function show($id)
    {
    	$pelanggan=$this->model->find($id);
    	return view('admin.pelanggan.show',compact('pelanggan'));
    }

    public function edit($id)
    {
    	$pelanggan=$this->model->find($id);
    	return view('admin.pelanggan.edit',compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required',
        ]);

    	$this->model->find($id)->update($request->all());
        Alert::success('Pelanggan', 'Berhasil Edit Pelanggan !');
    	return redirect()->route('pelanggan.index');
    }

    public function destroy($id)
    {
    	$this->model->find($id)->delete();
        Alert::warning('Pelanggan', 'Berhasil Hapus Pelanggan !');
    	return redirect()->route('pelanggan.index');
    }
}
