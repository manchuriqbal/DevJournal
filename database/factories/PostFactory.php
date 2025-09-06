<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Creator;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition(): array
    {
        $titile = $this->faker->unique()->sentence();
        $postableClasses = [Creator::class, Admin::class];
        $postableClass = $this->faker->randomElement($postableClasses);
        $postable = $postableClass::inRandomOrder()->first();
        return [
            "title" => $titile,
            "slug" => Str::slug($titile),
            "category_id" => Category::inRandomOrder()->first()->id ?? 1,
            "postable_id" => $postable->id,
            "postable_type" => get_class($postable),
            "content" => $this->faker->paragraph,
            "image" =>  "https://picsum.photos/640/480",
            "is_featured" => $this->faker->boolean(chanceOfGettingTrue: 20),
            "view_count" => $this->faker->numberBetween(0, 1000),
            "like_count" => $this->faker->numberBetween(0, 500),
        ];
    }
}
