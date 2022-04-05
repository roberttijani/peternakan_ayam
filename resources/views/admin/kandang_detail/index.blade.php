@extends('admin.layouts.app')
@section('title','Bibit Ayam')
@section('page','Bibit Ayam')
@section('content')
@section('head-script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('kandang_detail.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Tambah Bibit</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Suplier</th>
	              <th>Jenis Ayam</th>
	              <th>Kandang</th>
	              <th> Awal</th>
	              <th> Akhir</th>
	              <th>status</th>
	              <th>Keterangan</th>
	              <th>action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@php
	          		$no=1;
	          	@endphp
	            @foreach ($kandangdetails as $kandangdetail)
	            	<tr>
	            	  <td>{{ $no++ }}</td>
	            	  <td>{{ $kandangdetail->Suplier['nama'] }}</td>
	            	  <td>{{ $kandangdetail->Kategori->nama }}</td>
	            	  <td>{{ $kandangdetail->kandang['nama'] }}</td>
	            	  <td>{{ $kandangdetail->jumlah_awal }}</td>
	            	  <td>{{ $kandangdetail->jumlah_akhir }}</td>
	            	  <td><p class="{{ $kandangdetail->status == 'diternak' ? 'badge badge-primary' : 'badge badge-success' }}">{{ $kandangdetail->status }}</p></td>
	            	  <td>{{ $kandangdetail->keterangan }}</td>
	            	  <td>
	            	  	<form class="d-inline" method="POST" action="{{ route('panen',$kandangdetail->id) }}">
	            	  		@csrf
	            	  		@method('PUT')
	            	  		<button class="btn btn-rounded btn-success social-icon-btn"><i class="mdi mdi-bowl"></i></button>
	            	  	</form>
	            	  	<a href="{{ route('kandang_detail.edit',$kandangdetail->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	            	  	<form class="d-inline" method="POST" action="{{ route('kandang_detail.destroy',$kandangdetail->id) }}">
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
{{-- 	    {{ $kandangdetails->links() }} --}}
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
