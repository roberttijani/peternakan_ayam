@extends('admin.layouts.app')
@section('title','Kategori')
@section('page','Kategori')
@section('content')
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Buat Kategori</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>Harga</th>
	              <th>Action</th>
	              <th></th>
	            </tr>
	          </thead>
	          <tbody>
	            @foreach ($kategoris as $kategori)
	            	<tr>
	            	  <td>{{ $loop->iteration }}</td>
	            	  <td>{{ $kategori->nama }}</td>
	            	  <td>{{ $kategori->harga }}</td>
	            	  <td>
	            	  		<a href="{{ route('kategori.edit',$kategori->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>

	            	  		<form class="d-inline" method="POST" action="{{ route('kategori.destroy',$kategori->id) }}">
	            	  			@csrf
	            	  			@method('DELETE')
	            	  			<button class="btn btn-rounded social-icon-btn btn-danger"><i class="mdi mdi-delete"></i></button>
	            	  		</form>
	            	  </td>
	            	</tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection