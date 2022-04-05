@extends('admin.layouts.app')
@section('title','Kandang')
@section('page','Buat Kandang')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('kandang.update',$kandang->id) }}">
	          @csrf
	          @method('PUT')
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputEmail1" placeholder="Nama" name="nama" value="{{ old('nama',$kandang->nama) }}">
	            @error('nama')
	            	<div class="invalid-feedback">{{ message }}</div>
	            @enderror
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Kode</label>
	            <input type="number" class="form-control @error('kode') is-invalid @enderror" id="inputPassword1" placeholder="Enter your password" name="kode" value="{{ old('kode',$kandang->kode) }}">
	            @error('kode')
	            	<div class="invalid-feedback">{{ message }}</div>
	            @enderror
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Edit</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection