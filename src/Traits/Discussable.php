<?php

namespace LaravelLiberu\Discussions\Traits;

use Illuminate\Support\Facades\Config;
use LaravelLiberu\Discussions\Exceptions\DiscussionConflict;
use LaravelLiberu\Discussions\Models\Discussion;

trait Discussable
{
    public static function bootDiscussable()
    {
        self::deleting(fn ($model) => $model->attemptDiscussableDeletion());

        self::deleted(fn ($model) => $model->cascadeDiscussionDeletion());
    }

    public function discussion()
    {
        return $this->morphOne(Discussion::class, 'discussable');
    }

    public function discussions()
    {
        return $this->morphMany(Discussion::class, 'discussable');
    }

    private function attemptDiscussableDeletion()
    {
        if (
            Config::get('liberu.discussions.onDelete') === 'restrict'
            && $this->discussions()->exists()
        ) {
            throw DiscussionConflict::delete();
        }
    }

    private function cascadeDiscussionDeletion()
    {
        if (Config::get('liberu.discussions.onDelete') === 'cascade') {
            $this->discussions()->delete();
        }
    }
}
