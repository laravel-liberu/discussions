<?php

namespace LaravelLiberu\Discussions\Models\Traits;

use LaravelLiberu\Discussions\Enums\Reactions;
use LaravelLiberu\Discussions\Models\Reaction;

trait Reactable
{
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    public function claps()
    {
        return $this->morphMany(Reaction::class, 'reactable')
            ->whereType(Reactions::Clap);
    }
}
