@extends('admin.layouts.app')
@section('title','Riwayat Cek')
@section('page','Riwayat Cek')
@section('content')
@section('head-script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('ayam_cek.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Riwayat Cek</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>kandang</th>
	              <th>Ayam Mati</th>
	              <th>Ayam Sakit</th>
	              <th>tanggal</th>
	              <th>pemeriksa</th>
	              <th>action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@php
	          		$no=1;
	          	@endphp
	            @foreach ($ayamceks as $ayamcek)
	            	<tr>
	            	  <td>{{ $no++ }}</td>
	            	  <td>{{ $ayamcek->KandangDetail['Kandang']['nama']}}</td>
	            	  <td>{{ $ayamcek->ayam_mati }}</td>
	            	  <td>{{ $ayamcek->ayam_sakit }}</td>
	            	  <td>{{ $ayamcek->created_at->format('d-m-Y') }}</td>
	            	  <td>{{ $ayamcek->User->name }}</td>
	            	  <td>
	            	  	<a href="{{ route('ayam_cek.edit',$ayamcek->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	            	  	<form class="d-inline" method="POST" action="{{ route('ayam_cek.destroy',$ayamcek->id) }}">
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