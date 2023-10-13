<?php

namespace LaravelLiberu\Discussions;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Discussions\DynamicRelations\Discussions;
use LaravelLiberu\Discussions\DynamicRelations\Replies;
use LaravelLiberu\Discussions\Models\Discussion;
use LaravelLiberu\DynamicMethods\Services\Methods;
use LaravelLiberu\Users\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->relations()
            ->publish();
    }

    private function load()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/discussions.php', 'liberu.discussions');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        return $this;
    }

    private function relations()
    {
        Discussion::morphMap();
        Methods::bind(User::class, [Discussions::class, Replies::class]);

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['discussions-config', 'liberu-config']);

        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['discussions-factory', 'liberu-factories']);
    }
}
