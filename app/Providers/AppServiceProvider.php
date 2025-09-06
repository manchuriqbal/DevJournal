<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         Validator::extend('postable_exists', function ($attribute, $value, $parameters, $validator) {
            $data = $validator->getData();
            $table = $data['postable_type'] === 'App\Models\Admin' ? 'admins' : 'creators';
            return DB::table($table)->where('id', $value)->exists();
        });
    }
}
