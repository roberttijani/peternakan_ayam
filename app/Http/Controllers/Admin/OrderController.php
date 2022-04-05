<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kategori;
use App\Model\Pelanggan;
use App\Model\Order;
use App\Model\OrderDetail;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->model=new Order;
    }
    
    public function index()
    {
        $this->authorize('viewAny',$this->model);
        $order=$this->model->orderBy('created_at','desc')->get();
        return view('admin.order.index',compact('order'));
    }

 
    public function create()
    {
        $this->authorize('create',$this->model);
        $this->authorize('create',$this->model);
        $kategori=Kategori::where('stok','>',0)->get();
        $pelanggan=Pelanggan::all();
        return view('admin.order.form',compact('kategori','pelanggan'));
    }

    
    public function store(Request $request)
    {
        $this->authorize('create',$this->model);
        $this->authorize('create',$this->model);
        $request->validate([
            'pelanggan_id'=>'required',
            'kategori_id.*'=>'required',
            'harga.*'=>'required',
            'qty.*'=>'required',
            'subtotal.*'=>'required',
            'total'=>'required',

        ]);

        $stok=Kategori::all();
        if ($stok->sum('stok') < array_sum($request->qty)) {
            return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
        }else{

        $order=$this->model::create([
            'user_id'=>auth()->user()->id,
            'pelanggan_id'=>$request->pelanggan_id,
            'status'=>'proses',
            'total'=>$request->total,
        ]);

        for ($i=0; $i < count($request->kategori_id) ; $i++) { 
            $order->OrderDetail()->create([
                'kategori_id'=>$request->kategori_id[$i],
                'harga'=>$request->harga[$i],
                'qty'=>$request->qty[$i],
                'sub_total'=>$request->sub_total[$i],
            ]);
            $ctg=Kategori::find($request->kategori_id[$i]);

            if ($request->qty[$i] > $ctg->stok ) {
                return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
            }else{
                $ctg->update(['stok'=>$ctg->stok - $request->qty[$i]]);
            }
        }
      }
        Alert::success('Order', 'Berhasil Order !');
        return redirect(route('order.index'));
    }

   
    public function show($id)
    {
        $this->authorize('view',$this->model);
        $order=$this->model->find($id);
        return view('admin.order.detail',compact('order'));
    }

 
    public function edit($id)
    {
        $this->authorize('update',$this->model);
        $order=Order::find($id);
        $pelanggan=Pelanggan::all();
        $kategori=Kategori::where('stok','>',0)->get();
        return view('admin.order.form',compact('order','pelanggan','kategori'));
    }

   
    public function update(Request $request, $id)
    {
        $this->authorize('update',$this->model);
        $request->validate([
            'pelanggan_id'=>'required',
            'kategori_id.*'=>'required',
            'qty.*'=>'required',
            'total'=>'required',

        ]);

        $stok=Kategori::all();

        if ($stok->sum('stok') < array_sum($request->qty)) {
            return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
        }else{
            $order=Order::findOrFail($id);
            foreach ($order->OrderDetail as $index => $ord) {
                $ktg=Kategori::find($ord->kategori_id);
                $stok=$ktg->stok+$ord->qty;
                $ktg->update(['stok'=>$stok]);
            }

            $order->OrderDetail()->delete();

            $order->update([
                'pelanggan_id'=>$request->pelanggan_id,
                'total'=>$request->total,
            ]);

            for ($i=0; $i < count($request->kategori_id) ; $i++) { 
                $order->OrderDetail()->create([
                    'kategori_id'=>$request->kategori_id[$i],
                    'harga'=>$request->harga[$i],
                    'qty'=>$request->qty[$i],
                    'sub_total'=>$request->sub_total[$i],
                ]);
                $ctg=Kategori::find($request->kategori_id[$i]);
                $ctg->update(['stok'=>$ctg->stok - $request->qty[$i]]);
            }
            Alert::success('Order', 'Berhasil Edit Order !');
            return redirect(route('order.index'));
        }


    }

   
    public function destroy($id)
    {
        $this->authorize('delete',$this->model);
        $order=$this->model->find($id);
        $order->OrderDetail()->delete();
        $order->delete();
        Alert::warning('Hapus', 'Data Berhasil Di hapus !');
        return redirect(route('order.index'));
    }
}
