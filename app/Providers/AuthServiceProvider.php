<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Product;
use App\Policies\ProductPolicy;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-product', function ($user, $product){
           return $user->id == $product->user_id;
        });

        Gate::define('update-user', function ($user){
           return $user->id == Auth::user()->id;
        });

        Gate::define('delete-product', function ($user, $product){

           if($user->id == $product->user_id){
               return true;
           }else{
               return false;
           }
        });
    }
}
