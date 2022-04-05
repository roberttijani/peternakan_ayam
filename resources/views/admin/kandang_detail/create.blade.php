@extends('admin.layouts.app')
@section('title','Bibit')
@section('page','Buat Bibit')

@section('head-script')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('kandang_detail.store') }}">
	        @csrf
	          <div class="form-group">       
	        	<label>Suplier</label>
	              <select class="custom-select select-suplier @error('suplier_id') is-invalid @enderror" name="suplier_id">
	              	<option value="{{ null }}">-- pilih suplier --</option>
	                @foreach ($supliers as $suplier)
	                	<option value="{{ $suplier->id }}">{{ $suplier->nama }}</option>
	                @endforeach
	              </select>
	              @error('suplier_id')
	              	<div class="invalid-feedback">{{ $message }}</div>
	              @enderror
	          </div>

	          <div class="form-group">       
	        	<label>Kategori</label>
	              <select class="custom-select select-suplier @error('kategori_id') is-invalid @enderror" name="kategori_id">
	              	<option value="{{ null }}">--pilih spesies ayam--</option>
	                @foreach ($kategoris as $kategori)
	                	<option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
	                @endforeach
	              </select>
	              @error('kategori_id')
	              	<div class="invalid-feedback">{{ $message }}</div>
	              @enderror
	          </div>

	            <div class="form-group">       
	          	<label>kandang</label>
	                <select class="custom-select select-suplier  @error('kandang_id') is-invalid @enderror" name="kandang_id">
	                  <option value="{{ null }}">-- pilih kandang --</option>
	                  @foreach ($kandangs as $kandang)
	                  	<option value="{{ $kandang->id }}">{{ $kandang->nama }}</option>
	                  @endforeach
	                </select>
	                @error('kandang_id')
	              		<div class="invalid-feedback">{{ $message }}</div>
	              	@enderror
	            </div>

	          <div class="form-group">
	            <label for="inputPassword1">Jumlah</label>
	            <input type="number" name="jumlah_awal" class="form-control @error('jumlah_awal') is-invalid @enderror" id="inputPassword1" placeholder="Enter phone number">
	            @error('jumlah_awal')
	            	<div class="invalid-feedback">{{ $message }}</div>
	            @enderror
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Keterangan</label>
	            <div class="col-md-12 showcase_content_area">
	              <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="inputType9" cols="12" rows="5"></textarea>
	            </div>
	            @error('keterangan')
	              <div class="invalid-feedback">{{ $message }}</div>
	            @enderror
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Buat</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section('end-script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

	<script type="text/javascript">
      $(document).ready(function () {
          $(".select-suplier").select2({
            tags: true
          });
      });
  </script>
@endsection