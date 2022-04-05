@extends('admin.layouts.app')
@section('title','kandang')
@section('page','kandang')
@section('content')
@section('head-script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('kandang.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Buat Kandang</a>
	  </div>
	  
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table  id="data-kandang" class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>Kode</th>
	              <th>Status</th>
	              <th>Aksi</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@foreach ($kandangs as $kandang)
	          		<tr>
	          		  <td>{{ $loop->iteration }}</td>
	          		  <td>{{ $kandang->nama }}</td>
	          		  <td>{{ $kandang->kode }}</td>
	          		  <td>
	          		  	@if ($kandang->status == 'kosong')
	          		  		<p class="badge badge-success">Kosong</p>
	          		  	@else
	          		  		<p class="badge badge-primary">Terpakai</p>
	          		  	@endif
	          		  </td>
	          		  <td>
	          		  	<a href="{{ route('kandang.edit',$kandang->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	          		  	<form class="d-inline" method="POST" action="{{ route('kandang.destroy',$kandang->id) }}">
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
