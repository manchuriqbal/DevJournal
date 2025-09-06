<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition(): array
    {
        $categoryIds = Category::pluck('id')->toArray(); 

        $name = $this->faker->unique()->word; 

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph,
            'parent_id' => !empty($categoryIds) && $this->faker->boolean(30)
                ? $this->faker->randomElement($categoryIds)
                : null,
        ];
    }
}
