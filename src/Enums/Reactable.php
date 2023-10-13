<?php

namespace LaravelLiberu\Discussions\Enums;

use LaravelLiberu\Discussions\Models\Discussion;
use LaravelLiberu\Discussions\Models\Reply;
use LaravelLiberu\Enums\Services\Enum;

class Reactable extends Enum
{
    protected static array $data = [
        'discussion' => Discussion::class,
        'reply' => Reply::class,
    ];
}
