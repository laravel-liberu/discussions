<?php

namespace LaravelLiberu\Discussions\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Discussions\Models\Discussion;
use LaravelLiberu\Discussions\Models\Reply;

class ReplyFactory extends Factory
{
    protected $model = Reply::class;

    public function definition()
    {
        return [
            'discussion_id' => Discussion::factory(),
            'body' => $this->faker->sentence,
        ];
    }
}
