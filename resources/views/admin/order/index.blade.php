@extends('admin.layouts.app')
@section('title','Order')
@section('page','Order')
@section('content')
@section('head-script')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection		
	

	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('order.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Order</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Pelanggan</th>
	              <th>Tanggal</th>
	              <th>Status</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@foreach ($order as $ord)
	          		<tr>
	          			<td>{{ $loop->iteration }}</td>
	          			<td>{{ $ord->Pelanggan['nama'] }} <img class="profile-img img-sm" src="{{  Avatar::create($ord->Pelanggan->nama)->toBase64()  }}"></td>
	          			<td>{{ $ord->created_at->format('d-m-Y') }}</td>
	          			<td>
	          				@if ( $ord->status == 'selesai')
	          					<p class="badge badge-success">Selesai</p>
	          				@elseif($ord->status == 'proses')
	          					<p class="badge badge-primary">proses</p>
	          				@elseif($ord->status == 'pending')
	          					<p class="badge badge-dark">pending</p>
	          				@else
	          					<p class="badge badge-danger">batal</p>
	          				@endif
	          			</td>
	          			<td>
	          				<a href="{{ route('order.show',$ord->id) }}"class="btn btn-rounded social-icon-btn btn-success"><i class="mdi mdi-eye"></i></a>
	          				<a href="{{ route('order.edit',$ord->id) }}"  class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	          				<form class="d-inline" method="POST" action="{{ route('order.destroy',$ord->id) }}">
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
