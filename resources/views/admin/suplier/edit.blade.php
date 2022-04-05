@extends('admin.layouts.app')
@section('title','Suplier')
@section('page','Edit Suplier')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('suplier.update',$suplier->id) }}">
	        @csrf
	        @method('PUT')
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputEmail1" placeholder="Enter your email" value="{{ old('nama',$suplier->nama) }}">
	            @error('nama')
	            	<div class="invalid-feedback">{{ $message }}</div>
	            @enderror
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">No Hp</label>
	            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="inputPassword1" placeholder="Enter phone number" value="{{ $suplier->no_hp }}">
	            @error('no_hp')
	            	<div class="invalid-feedback">{{ $message }}</div>
	            @enderror
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Alamat</label>
	            <div class="col-md-12 showcase_content_area">
	              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="inputType9" cols="12" rows="5">{{  old('alamat',$suplier->alamat)}}</textarea>
	            </div>
	            @error('alamat')
	            	<div class="invalid-feedback">{{ $message }}</div>
	            @enderror
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Update</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection