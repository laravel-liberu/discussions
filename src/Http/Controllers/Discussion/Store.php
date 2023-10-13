<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Discussion;

use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Requests\ValidateDiscussionStore;
use LaravelLiberu\Discussions\Http\Resources\Discussion as Resource;
use LaravelLiberu\Discussions\Models\Discussion;

class Store extends Controller
{
    public function __invoke(ValidateDiscussionStore $request, Discussion $discussion)
    {
        $discussion->fill($request->validated())->save();

        $discussion->load([
            'createdBy.avatar', 'reactions.createdBy.avatar', 'replies.createdBy.avatar',
            'replies.reactions.createdBy.avatar',
        ]);

        return new Resource($discussion);
    }
}
