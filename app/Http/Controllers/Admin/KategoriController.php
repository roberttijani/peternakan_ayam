<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
	public function __construct()
	{
		$this->model=new Kategori;
	}

    public function index()
    {
        $this->authorize('viewAny',$this->model);
        $kategoris=$this->model->all();
    	return view('admin.kategori.index',compact('kategoris'));
    }

    public function create()
    {
        $this->authorize('create',$this->model);
    	return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',$this->model);
        $request->validate([
            'nama'=>'required',
            'harga'=>'required',
        ]);

        $request->merge(['status'=>'habis']);
        $this->model->create($request->all());
        Alert::success('Kategori', 'Berhasil Tambah Kategori !');
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $this->authorize('update',$this->model);
        $kategori=$this->model->find($id);
        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request,$id)
    {
        $this->authorize('update',$this->model);
        $request->validate([
            'nama'=>'required',
            'harga'=>'required',
        ]);
        
        $this->model->find($id)->update($request->all());
        Alert::success('Kategori', 'Berhasil Edit Kategori !');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $this->authorize('delete',$this->model);
        $this->model->find($id)->delete();
        Alert::warning('Kategori', 'Berhasil Hapus Kategori !');
        return redirect()->route('kategori.index');
    }
}
