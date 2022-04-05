@extends('admin.layouts.app')
@section('title','Dashboard')
@section('page','Dashboard')
@section('content')
	<div class="col-lg-12">
		<div class="row">
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-light bg-dark">
		        <div class="d-flex justify-content-between">
		          <p>{{ $pelanggan->count() }}&nbsp; Pelanggan</p>
		        </div>
		        <p class="text-light font-weight-bold">Pelanggan</p>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-light bg-success">
		        <div class="d-flex justify-content-between">
		          
		          	<p>{{ $kategoris->sum('stok') }}&nbsp; Ekor</p>
		          
		        </div>
		        <p class="text-light font-weight-bold">Stok Ayam</p>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-light bg-primary">
		        <div class="d-flex justify-content-between">
		          <p>{{ $kandang_detail->count() }} &nbsp; Kandang</p>
		        </div>
		        <p class="text-light font-weight-bold">Kandang Aktiv</p>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-light bg-warning" >
		        <div class="d-flex justify-content-between">
		          <p>{{ $order->count() }}&nbsp;</p>
		        </div>
		        <p class="text-light font-weight-bold">Order</p>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="row">
			<div class="col-md-8 equel-grid">
			  <div class="grid">
			    <div class="grid-body py-3">
			      <p class="card-title ml-n1">Order History</p>
			    </div>
			    <div class="table-responsive">
			      <table class="table table-hover table-sm">
			        <thead>
			          <tr class="solid-header">
			            <th colspan="2" class="pl-4">Pelanggan</th>
			            <th>No Hp</th>
			            <th>Tanggal</th>
			          </tr>
			        </thead>
			        <tbody>
			          
			          @foreach ($order->take(4) as $ord)
			            <tr>
			            	<td class="pr-0 pl-4">
			            	  <img class="profile-img img-sm" src="{{  Avatar::create($ord->Pelanggan->nama)->toBase64()  }}" alt="profile image">
			            	</td>
			            	<td class="pl-md-0">
			            	  <small class="text-black font-weight-medium d-block">{{ $ord->Pelanggan->nama }}</small>
			            	  <span class="text-gray">
			            	    <span class="status-indicator rounded-indicator small bg-primary"></span>{{ $ord->status }}</span>
			            	</td>
			            	<td>
			            	  <small>{{ $ord->Pelanggan->no_hp }}</small>
			            	</td>
			            	<td> {{ $ord->created_at->format('d-m-Y') }} </td>
			            </tr>
			          @endforeach
			          
			        </tbody>
			      </table>
			    </div>
			    <a class="border-top px-3 py-2 d-block text-gray" href="{{ route('order.index') }}">
			      <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small>
			    </a>
			  </div>
			</div>
			<div class="col-md-4 equel-grid">
			  <div class="grid">
			    <div class="grid-body">
			      <div class="split-header">
			        <p class="card-title">Kategori & Stok</p>
			        <div class="btn-group">
			          <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			            <i class="mdi mdi-dots-vertical"></i>
			          </button>
			          <div class="dropdown-menu dropdown-menu-right">
			            <a class="dropdown-item" href="#">Expand View</a>
			            <a class="dropdown-item" href="#">Edit</a>
			          </div>
			        </div>
			      </div>
			      <div class="vertical-timeline-wrapper">
			        <div class="timeline-vertical dashboard-timeline">
			          @foreach ($kategoris as $kategori)
			          	<div class="activity-log">
			          	  <p class="log-name">{{ $kategori->nama }}</p>
			          	  <div class="log-details text-bold">{{ $kategori->stok }}&nbsp &nbsp Ekor</div>
			          	  <small class="log-time">
			          	  	@if ($kategori->stok == 20)
			          	  		<p class="badge badge-warning">Hampir Habis</p>
			          	  	@elseif($kategori->stok == 0)
			          	  		<p class="badge badge-danger"> habis</p>
			          	  	@else
			          	  		<p class="badge badge-success">Tersedia</p>
			          	  	@endif
			          	  </small>
			          	</div>
			          @endforeach
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>

		<div class="row p-2  d-flex justify-content-between">
			<div class="col-md-8 card">
				<div class="laku" style="height: 300px;"></div>
			</div>
			<div class="col-md-4 card">
				<div class="sakit" style="height: 300px;"></div>
			</div>
		</div>
	</div>
@endsection
@section('end-script')
<!-- Charting library -->
<script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<script>
    @php
        $kategoris = DB::table('kategori')->get();
        $jual = DB::table('order_detail')->orderBy('created_at', 'desc')->paginate(25);
    @endphp
    
     var chart = new Chartisan({
            el: '.laku',
            data: {
                chart: {
                    labels: [
                        @foreach($jual as $kategori)
                            '{{ $kategori->created_at }}',
                        @endforeach
                    ]
                },
                datasets: [
                    { name: 'Penjualan', values: [ @foreach($jual as $ktg) {{ $ktg->qty }}, @endforeach ]},
                ]
            },
            hooks: new ChartisanHooks()
                .datasets('bar')
                .colors()
                .legend({ position: 'top' })
                .title('Grafik Penjualan')
                .datasets(['bar']),
        })

     	var chart = new Chartisan({
     	           el: '.sakit',
     	           data: {
     	               chart: {
     	                   labels: [
     	                       'ayam mati',
     	                       'ayam sakit',
     	                       'ayam sehat',
     	                   ]
     	               },
     	               datasets: [
     	                   {
     	                       name: '# of Votes',
     	                       values: [
     	                           {{ $cek->sum('ayam_mati') }},
     	                           {{ $cek->sum('ayam_sakit') }},
     	                           {{ $ayamall->sum('jumlah_akhir') }},
     	                       ],
     	                   }
     	               ]
     	           },
     	           hooks: new ChartisanHooks()
     	               .datasets('pie')
     	               .pieColors()
     	               .title('Grafik Kondisi Ayam')
     	               .legend({ position: 'bottom' })
     	       })
</script>
@endsection
