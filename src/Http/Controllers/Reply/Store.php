<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Reply;

use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Requests\ValidateReply;
use LaravelLiberu\Discussions\Http\Resources\Reply as Resource;
use LaravelLiberu\Discussions\Models\Reply;

class Store extends Controller
{
    public function __invoke(ValidateReply $request, Reply $reply)
    {
        $reply->fill($request->validated())->save();

        return new Resource($reply->load('createdBy.avatar', 'reactions'));
    }
}
