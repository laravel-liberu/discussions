<?php

namespace LaravelLiberu\Discussions\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Discussions\Models\Discussion;

class DiscussionFactory extends Factory
{
    protected $model = Discussion::class;

    public function definition()
    {
        return [
            'discussable_id' => $this->faker->randomKey,
            'discussable_type' => $this->faker->word,
            'body' => $this->faker->sentence,
            'title' => $this->faker->sentence,
        ];
    }
}
