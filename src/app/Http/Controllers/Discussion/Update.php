<?php

namespace LaravelEnso\Discussions\App\Http\Controllers\Discussion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;
use LaravelEnso\Discussions\App\Http\Requests\ValidateDiscussionUpdate;
use LaravelEnso\Discussions\App\Models\Discussion;

class Update extends Controller
{
    use AuthorizesRequests;

    public function __invoke(ValidateDiscussionUpdate $request, Discussion $discussion)
    {
        $this->authorize('handle', $discussion);

        $discussion->update($request->validated());
    }
}
