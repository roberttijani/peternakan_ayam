@php
	$isEdit=isset($order);
	$action=$isEdit ? route('order.update',$order->id) : route('order.store');
	$put=$isEdit ? method_field('PUT') : null ;
@endphp

@extends('admin.layouts.app')
@section('title','Order')
@section('page','Buat Order')

@section('head-script')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
@endsection

@section('content')
	
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	  	
	  	@if (session('stok'))
	  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
	  		  <strong>{{ session('stok') }}</strong>
	  		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  		    <span aria-hidden="true">&times;</span>
	  		  </button>
	  		</div>
	  	@endif

	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ $action }}" x-data="dataorder()" >
	        @csrf
	        {{ $put }}
	          <div class="row mb-4">
	          	<div class="col-md-3">
	          	  <label>Nama Pelanggan</label>
	              <select name="pelanggan_id" class="custom-select pelanggan @error('pelanggan_id') is-invalid @enderror"  x-model="pelanggan_id">
	               	<option value="{{ null }}">-- pilih pelanggan --</option>
	               	@foreach ($pelanggan as $plg)
	               		<option value="{{ old('pelanggan_id',$plg->id ) }}">{{ $plg->nama }}</option>
	               	@endforeach
	              </select>
	              @error('pelanggan_id')
	                  <div class="invalid-feedback">{{ $message }}</div>
	              @enderror
	          	</div>
	          </div>

	          <template x-for="(row,index) in rows" :key="row">
	          	<div class="row">
	          		<div class="col-md-3">
	          		 <label>Kategori</label>
	          	    <select name="kategori_id[]" class="custom-select select-suplier @error('kategori_id.*') is-invalid @enderror"  x-model="row.kategori_id" x-on:change="setPrice(row.kategori_id,index)" >
	          	    	<option value="{{ null }}">--pilih kategori--</option>
	          	     	@foreach ($kategori as $ctg)
	          	     		<option value="{{ $ctg->id }}">{{ $ctg->nama }}</option>
	          	     	@endforeach
	          	    </select>
	          	    @error('kategori_id.*')
	          	    	<div class="invalid-feedback">{{ $message }}</div>
	          	    @enderror
	          		</div>

	          		<div class="col-md-3">
	          		  <label>Harga</label>
	          	     <input type="number" name="harga[]" class="form-control" id="inputPassword1" placeholder="Enter phone number" x-model="row.harga" readonly>
	          		</div>

	          		<div class="col-md-3">
	          		  <label>Jumlah</label>
	          	     <input type="number" name="qty[]" class="form-control @error('qty.*') is-invalid @enderror" id="inputPassword1" placeholder="Masukkan Jumlah" x-on:change="setSub(index)" x-model='row.qty'>

	          	     @error('qty.*')
	          	     	<div class="invalid-feedback">{{ $message }}</div>
	          	     @enderror
	          		</div>

	          		<div class="col-md-3">
	          		  <label>subtotal</label>
	          	     <input type="number" name="sub_total[]" class="form-control" id="inputPassword1" placeholder="subtotal" readonly  x-model="row.sub_total" x-on:change="setTotal()">
	          		</div>
	          	</div>
	          </template>

	          <div class="row">
	          	<div class="col-md-12 float-right">
	          	  <div class="float-right"> 
	          	  	<label>Total</label>
	               	<input type="number" name="total" class="form-control" id="inputPassword1" placeholder="Enter phone number" readonly x-model="total">
	          	  </div>
	          	</div>
	          </div>

	          <div class="row my-4">
	          	<div class="col-md-3">
	          		<button type="button" class="btn btn-rounded btn-success" x-on:click="addRow()">Tambah</button>
	          		<button type="button" class="btn btn-rounded btn-danger ml-3" x-on:click="rmRow()">Hapus</button>
	          	</div>
	          	<div class="col-md-9">
	          		<button class="btn btn-rounded btn-primary float-right">Order</button>
	          	</div>
	          </div>

	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section('end-script')
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>

	<script type="text/javascript">
      $(document).ready(function () {
          $(".pelanggan").select2();
      });

      function dataorder() {
      	const InialRow={kategori_id:null,harga:0,qty:0,sub_total:0};
      	const kategori=@json($kategori);
      


      	return {
      		// data
      		@if($isEdit)
      			rows :@json($order->OrderDetail),
      			total:{{ $order->total }},
      			pelanggan_id:{{ $order->pelanggan_id }},
      		@else
      			rows:[Object.assign({},InialRow),],
      			total:0,
      			pelanggan_id:'',
      		@endif

      		

      		// method

      		addRow(){
      			this.rows.push(Object.assign({},InialRow));
      		},

      		rmRow(){
      			this.rows.pop();
      			this.setTotal();
      		},

      		setPrice(id,index){
      			const ktg=kategori.find(ktg => ktg.id == id);
      			const result=ktg ? ktg.harga : null;

      			this.rows[index].harga=result;
      			this.setSub(index);
      		},

      		setSub(index){
      			const row=this.rows[index];

      			if(row.harga && row.qty){
      				const result=row.harga * row.qty;
      				row.sub_total=result;
      				this.setTotal();
      			}

      		},

      		setTotal(){
      			let result =0;

      			if(this.rows.length > 1 ){
      				result=this.rows.reduce((total,row)=>(total+ row.sub_total),0);
      			}else if(this.rows.length == 1){
      				result=this.rows[0].sub_total
      			}
      			
      			this.total=result;
      		},

      	

      	}
      }

  </script>
@endsection