<?php

namespace LaravelLiberu\Discussions\Http\Controllers\Reaction;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use LaravelLiberu\Discussions\Http\Resources\Reaction as Resource;
use LaravelLiberu\Discussions\Models\Reaction;

class Toggle extends Controller
{
    public function __invoke(Request $request)
    {
        $reactable = Relation::getMorphedModel($request->get('reactableType'))::find($request->get('reactableId'));

        Reaction::toggle($reactable, $request->only(['userId', 'type']));

        return Resource::collection(
            $reactable->reactions()->with(['createdBy.avatar'])->get()
        );
    }
}
