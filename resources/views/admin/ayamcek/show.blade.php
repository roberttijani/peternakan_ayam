@extends('admin.layouts.app')
@section('title','suplier')
@section('page','Detail suplier')
@section('content')
	<div class="col-lg-12">
	  <div class="grid">
	    <p class="grid-header">Detail Suplier</p>
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <div class="row mb-3">
	          <div class="col-md-8 mx-auto">
	            <div class="form-group row showcase_row_area">
	              <div class="col-md-3 showcase_text_area">
	                <label for="inputType1">Name</label>
	              </div>
	              <div class="col-md-9 showcase_content_area">
	                <input type="text" class="form-control disable" id="inputType1" value="{{ $pelanggan->nama }}" disabled="">
	              </div>
	            </div>
	            <div class="form-group row showcase_row_area">
	              <div class="col-md-3 showcase_text_area">
	                <label for="inputType1">No Hp</label>
	              </div>
	              <div class="col-md-9 showcase_content_area">
	                <input type="text" class="form-control disable" id="inputType1" value="{{ $pelanggan->no_hp }}" disabled="">
	              </div>
	            </div>
	            <div class="form-group row showcase_row_area">
	              <div class="col-md-3 showcase_text_area">
	                <label for="inputType9">Textarea</label>
	              </div>
	              <div class="col-md-9 showcase_content_area">
	                <textarea class="form-control" id="inputType9" cols="12" rows="5" disabled>
	                	{{ $pelanggan->alamat }}
	                </textarea>
	              </div>
	            </div>
	            <div class="form-group row showcase_row_area">
	            	<div class="col-md-3 showcase_text_area">
	            	  <label for="inputType9"></label>
	            	</div>
	            	<div class="my-3 col-md-9 showcase_content_area">
	            		<a href="{{ route('pelanggan.index') }}" class="btn btn-rounded btn-primary">Kembali</a>
	            	</div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
@endsection