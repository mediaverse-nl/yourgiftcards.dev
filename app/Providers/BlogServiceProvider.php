<?php

namespace App\Providers;

use App\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $nieuws = Blog::orderBy('created_at', 'DESC')->where('status', 'live')->first();

        view()->share('nieuws', $nieuws);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
