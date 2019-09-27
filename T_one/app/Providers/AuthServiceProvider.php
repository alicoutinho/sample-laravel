<?php

namespace App\Providers;

use App\Permission;
use App\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Product::class => 'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('edit_product' ,function ($user,$product){
//            return $user->id==$product->user_id ;
//        });
        /*Gate::define('edit_pro' ,function ($user,$product){
            return $user->hasRole(Permission::whereName('edit_pro')->first()->roles()) ;
         });
        Gate::define('edit_user' ,function ($user){
            return $user->hasRole(Permission::whereName('edit_user')->first()->roles()) ;
        });*/
//        foreach ($this->getPermissions() as $permission) {
//            Gate::define($permission->name, function ($user) use ($permission) {
//                return $user->hasRole($permission->roles);
//            });
//        }
  }
//    public function getPermissions()
//    {
//        return Permission::with('roles')->get();
//    }
    }
