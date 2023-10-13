<?php

namespace LaravelLiberu\Discussions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Discussions\Exceptions\DiscussionConflict;
use LaravelLiberu\Discussions\Models\Traits\Reactable;
use LaravelLiberu\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelLiberu\Helpers\Traits\CascadesMorphMap;
use LaravelLiberu\Helpers\Traits\UpdatesOnTouch;
use LaravelLiberu\TrackWho\Traits\CreatedBy;
use LaravelLiberu\Users\Models\User;

class Discussion extends Model
{
    use CascadesMorphMap, CreatedBy, HasFactory, Reactable;
    use UpdatesOnTouch, AvoidsDeletionConflicts;

    protected $guarded = ['id'];

    protected $touches = ['discussable'];

    public function discussable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeFor($query, $params)
    {
        $query->whereDiscussableId($params['discussable_id'])
            ->whereDiscussableType($params['discussable_type']);
    }

    public function getLoggableMorph()
    {
        return Config::get('liberu.discussions.loggableMorph');
    }

    public function delete()
    {
        if ($this->replies()->exists()) {
            throw DiscussionConflict::hasReplies();
        }

        return parent::delete();
    }
}
