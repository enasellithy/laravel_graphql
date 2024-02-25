<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIDS = DB::table('users')->pluck('id');

        return [
            'title' => $this->faker->words(2, true),
            'content' => $this->faker->sentences(3, true),
            'author_id' => $this->faker->randomElement($userIDS)
        ];
    }
}
