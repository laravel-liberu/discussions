<?php

namespace LaravelLiberu\Discussions;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelLiberu\Discussions\Models\Discussion;
use LaravelLiberu\Discussions\Models\Reply;
use LaravelLiberu\Discussions\Policies\Discussion as DiscussionPolicy;
use LaravelLiberu\Discussions\Policies\Reply as ReplyPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Discussion::class => DiscussionPolicy::class,
        Reply::class => ReplyPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
