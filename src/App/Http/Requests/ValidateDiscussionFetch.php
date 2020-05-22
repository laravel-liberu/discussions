<?php

namespace LaravelEnso\Discussions\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelEnso\Helpers\App\Traits\TransformMorphMap;

class ValidateDiscussionFetch extends FormRequest
{
    use TransformMorphMap;

    public function morphType(): string
    {
        return 'discussable_type';
    }

    public function rules()
    {
        return [
            'discussable_id' => 'required',
            'discussable_type' => 'required',
        ];
    }
}