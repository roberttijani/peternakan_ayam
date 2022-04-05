@extends('admin.layouts.app')
@section('title','user')
@section('page','user')
@section('content')
@section('head-script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('user.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Tambah user</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>No Hp</th>
	              <th>Email</th>
	              <th>Alamat</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@php
	          		$no=1;
	          	@endphp
	            @foreach ($users as $suplier)
	            	<tr>
	            	  <td>{{ $no++ }}</td>
	            	  <td>{{ $suplier->name }}</td>
	            	  <td>{{ $suplier->no_hp }}</td>
	            	  <td>{{ $suplier->email }}</td>
	            	  <td>{{ $suplier->alamat }}</td>
	            	  <td>
	            	  	<a href="{{ route('user.show',$suplier->id) }}" class="btn btn-rounded social-icon-btn btn-success"><i class="mdi mdi-eye"></i></a>
	            	  	<a href="{{ route('user.edit',$suplier->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	            	  	<form class="d-inline" method="POST" action="{{ route('user.destroy',$suplier->id) }}">
	            	  		@csrf
	            	  		@method('DELETE')
	            	  		<button class="btn btn-rounded btn-danger social-icon-btn"><i class="mdi mdi-delete"></i></button>
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
@section('end-script')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

	<script>
		$(document).ready(function(){
			$('.table').DataTable();
		});
;
	</script>
@endsection