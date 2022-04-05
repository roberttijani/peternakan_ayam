<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Dashboard'               => 'App\Policies\UserPolicy',
        'App\Model\AyamCek'       => 'App\Policies\AyamCekPolicy',
        'App\Model\Kandang'       => 'App\Policies\KandangPolicy',
        'App\Model\KandangDetail' => 'App\Policies\KandangDetailPolicy',
        'App\Model\Kategori'      => 'App\Policies\KategoriPolicy',
        'App\Model\Order'         => 'App\Policies\OrderPolicy',
        'App\Model\OrderDetail'   => 'App\Policies\OrderDetailPolicy',
        'App\Model\Pelanggan'     => 'App\Policies\PelangganPolicy',
        'App\Model\Suplier'       => 'App\Policies\SuplierPolicy',
        'App\Model\User'          => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
