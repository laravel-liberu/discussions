<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Reply;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Requests\ValidateReply;
use LaravelLiberu\Discussions\Http\Resources\Reply as Resource;
use LaravelLiberu\Discussions\Models\Reply;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateReply $request, Reply $reply)
    {
        $this->authorize('handle', $reply);

        $reply->update($request->validated());

        return new Resource($reply->load('createdBy.avatar', 'reactions.createdBy.avatar'));
    }
}
