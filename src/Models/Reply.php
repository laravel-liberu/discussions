<?php

namespace LaravelLiberu\Discussions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelLiberu\Discussions\Models\Traits\Reactable;
use LaravelLiberu\TrackWho\Traits\CreatedBy;
use LaravelLiberu\Users\Models\User;

class Reply extends Model
{
    use Reactable, CreatedBy, HasFactory;

    protected $table = 'discussion_replies';

    protected $guarded = ['id'];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
