@php
$current_path='/'.request()->path();
  $dashboard=[
    'url'=>'/admin',
    'title'=>'Dashboard',
    'model'=>'Dashboard',
    'icon'=>'mdi mdi-gauge link-icon'
  ];

  $suplier=[
    'url'=>'#',
    'title'=>'Suplier',
    'model'=>App\Model\Suplier::class,
    'icon'=>'mdi mdi-truck link-icon',
    'child'=>[
      [
        'title'=>'Data Suplier',
        'url'=>'/admin/suplier',
      ],
      [
        'title'=>'Tambah Suplier',
        'url'=>'/admin/suplier/create',
      ],
    ]
  ];

  $pelanggan=[
    'url'=>'#',
    'title'=>'Pelanggan',
    'model'=>App\Model\Pelanggan::class,
    'icon'=>'mdi mdi-clipboard-account link-icon',
    'child'=>[
      [
        'title'=>'Data Pelanggan',
        'url'=>'/admin/pelanggan',
      ],
      [
        'title'=>'Tambah Pelanggan',
        'url'=>'/admin/pelanggan/create',
      ],
    ]
  ];

  $kategori=[
    'url'=>'/admin/kategori',
    'title'=>'Spesies Ayam',
    'model'=>App\Model\Kategori::class,
    'icon'=>'mdi mdi-leaf link-icon',
    'child'=>[
      [
        'title'=>'Data Spesies',
        'url'=>'/admin/kategori'
      ],
      [
        'title'=>'Buat Spesies',
        'url'=>'/admin/kategori/create'
      ],
    ]
  ];

  $kandang=[
    'url'=>'#',
    'title'=>'Kandang',
    'model'=>App\Model\Kandang::class,
    'icon'=>'mdi mdi-basket link-icon',
    'child'=>[
      [
        'title'=>'Data Kandang',
        'url'=>'/admin/kandang'
      ],
      [
        'title'=>'Buat Kandang',
        'url'=>'#'
      ],
    ]
  ];

  $user=[
    'url'=>'/admin/user/',
    'title'=>'User',
    'model'=>App\Model\User::class,
    'icon'=>'mdi mdi-account link-icon'
  ];

  $order=[
    'url'=>'#',
    'title'=>'Order',
    'model'=>App\Model\Order::class,
    'icon'=>'mdi mdi-cart-outline link-icon',
    'child'=>[
      [
        'title'=>'Buat Order',
        'url'=>'/admin/order/create'
      ],
      [
        'title'=>'Riwayat Order',
        'url'=>'/admin/order/'
      ],
    ]
  ];

   $cekayam=[
    'url'=>'#',
    'title'=>'Cek Ayam',
    'model'=>App\Model\AyamCek::class,
    'icon'=>'mdi mdi-cloud-check link-icon',
    'child'=>[
      [
        'title'=>'Buat data',
        'url'=>'/admin/ayam_cek/create'
      ],
      [
        'title'=>'Riwayat kondisi',
        'url'=>'/admin/ayam_cek'
      ],
    ]
  ];

   $data_ayam=[
    'url'=>'#',
    'title'=>'Data Ayam',
    'model'=>App\Model\KandangDetail::class,
    'icon'=>'mdi mdi mdi-owl link-icon',
    'child'=>[
      [
        'title'=>'data bibit',
        'url'=>'/admin/kandang_detail'
      ],
      [
        'title'=>'bibit baru',
        'url'=>'/admin/kandang_detail/create'
      ],
    ]
  ];

 $menus=[$dashboard,$kategori,$kandang,$data_ayam,$cekayam,$order,$suplier,$pelanggan,$user];
@endphp

<div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="/Label_Admin/src/assets/images/profile/male/image_1.png" alt="profile image">
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <small class="text-muted">{{ auth()->user()->role }}</small>
          </div>
        </div>
        {{-- area menu --}}
        <ul class="navigation-menu">
          <li class="nav-category-divider">MAIN</li>
          @foreach ($menus as $index=>$menu)
            @can('viewAny',$menu['model'])
                @if (isset($menu['child']))
                @php
                  $IsActive=false;

                  foreach ($menu['child'] as $child) {
                    if ($child['url'] == $current_path) {
                      $IsActive=true;
                    }
                    
                  }
                @endphp
                  <li class="{{ $IsActive ? 'active' :'null' }}">
                    <a href="#" data-toggle="collapse" aria-expanded="false" data-target="#menu{{ $index }}">
                      <span class="link-title">{{ $menu['title'] }}</span>
                      <i class="{{ $menu['icon'] }}"></i>
                    </a>
                    <ul class="collapse navigation-submenu" id="menu{{ $index }}">
                      @foreach ($menu['child'] as $child)
                
                          <li class="{{ $child['url'] == $current_path ? 'active' :'null' }}">
                            <a href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                          </li>
                
                      @endforeach
                    </ul>
                  </li>
                @else
                  <li class="{{ $menu['url'] == $current_path ? 'active' :'null' }}">
                    <a href="{{ $menu['url'] }}">
                      <span class="link-title">{{ $menu['title'] }}</span>
                      <i class="{{ $menu['icon'] }}"></i>
                    </a>
                  </li>
                @endif
            @endcan
          @endforeach
        </ul>
      </div>