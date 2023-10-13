<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Discussion;

use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Requests\ValidateDiscussionFetch;
use LaravelLiberu\Discussions\Http\Resources\Discussion as Resource;
use LaravelLiberu\Discussions\Models\Discussion;

class Index extends Controller
{
    public function __invoke(ValidateDiscussionFetch $request)
    {
        return Resource::collection(
            Discussion::with([
                'createdBy.avatar', 'reactions.createdBy.avatar', 'replies.createdBy.avatar',
                'replies.reactions.createdBy.avatar', // 'taggedUsers',
            ])->latest()
            ->for($request->validated())
            ->get()
        );
    }
}
