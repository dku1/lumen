<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */

class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(rand(1, 10)),
            'category_id' => Category::get()->random()->id,
            'preview_image' => $this->faker->imageUrl,
            'main_image' => $this->faker->imageUrl,
            'content' => $this->faker->text,
        ];
    }
}
