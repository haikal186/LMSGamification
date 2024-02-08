<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::enforceMorphMap([
            'post'     => 'App\Models\Post',
            'course' => 'App\Models\Course',
            'quiz' => 'App\Models\Quiz',
            'question' => 'App\Models\Question',
        ]);
    }
}
