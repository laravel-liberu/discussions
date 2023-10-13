<?php

namespace LaravelLiberu\Discussions\DynamicRelations;

use Closure;
use LaravelLiberu\Discussions\Models\Reply;
use LaravelLiberu\DynamicMethods\Contracts\Method;

class Replies implements Method
{
    public function name(): string
    {
        return 'replies';
    }

    public function closure(): Closure
    {
        return fn () => $this->hasMany(Reply::class, 'created_by');
    }
}
