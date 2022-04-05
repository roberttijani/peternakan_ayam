@extends('admin.layouts.app')
@section('title','Order')
@section('page','Buat Order')

@section('content')
	
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="row mb-3">
			<div class="col-md-12">
				<a href="{{ route('order.index') }}" class="btn btn-primary">Kembali</a>
				<a href="" class="btn btn-success float-right"> <i class="mdi mdi-printer"></i> Cetak</a>
			</div>
		  </div>
	      <div class="item-wrapper">
	      	<div class="row bg-dark">
				<div class="col-md-12 p-4">
					<span class="text-light text-center p-4"><h5>PT. Kandang Ayam</h5></span>
				</div>
			</div>
			<div class="row my-4  d-flex justify-content-between">
				<div class="col-md-6">
					<div><p>Nama : {{ $order->Pelanggan->nama }}</p></div>
					<div><p>Hp &emsp; : {{ $order->Pelanggan->no_hp }}</p></div>
				</div>
				<div class="col-md-6">
					<div class="float-right">Tanggal : {{ $order->created_at->format('d-m-Y') }}</div>
				</div>
			</div>
			<div class="pt-2">
				<hr>
					<p class="text-center"><i>Detail Pempelian Ayam</i></p>
				<hr>
			</div>
			<div class="row my-4 pt-4 pb-4">
				<div class="col-md-12">
					<div class="table-responsive">
					  <table class="table info-table table-bordered">
					 
					      <tr>
					        <th>Item</th>
					        <th>Jumlah</th>
					        <th>Harga</th>
					        <th>Subtotal</th>
					      </tr>
					  
					      @foreach ($order->OrderDetail as $item)
					      	<tr>
					      		<td>{{ $item->Kategori['nama'] }}</td>
					        	<td>{{ $item->qty }}</td>
					        	<td>Rp.{{ $item->harga }}</td>
					        	<td>Rp.{{ $item->sub_total }}</td>
					      	</tr>
					      @endforeach
					      <tr>
					      	<td colspan="2"></td>
					        <td>total</td>
					        <td>Rp.{{ $order->total }}</td>
					      </tr>
					
					  </table>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-md-12 p-4">
					<p>
						<p class="font-weight-bold">*note</p>
						detail pembelian ayam potong.
					</p>
				</div>
			</div>
			<div class="row bg-dark">
				<div class="col-md-12 p-4">
					<span class="text-light text-center"><p>&copy;PT.kandangAyam2020</p></span>
				</div>
			</div>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
