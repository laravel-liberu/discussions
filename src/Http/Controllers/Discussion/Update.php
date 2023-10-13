<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Discussion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Requests\ValidateDiscussionUpdate;
use LaravelLiberu\Discussions\Models\Discussion;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateDiscussionUpdate $request, Discussion $discussion)
    {
        $this->authorize('handle', $discussion);

        $discussion->update($request->validated());
    }
}
