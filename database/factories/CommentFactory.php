<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Creator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Comment::class;
    public function definition(): array
    {
      
        $commenterClasses = [ User::class, Creator::class, Admin::class];
        $commenterClass = $this->faker->randomElement($commenterClasses);
        $commenter = $commenterClass::inRandomOrder()->first();

        $commentable = Post::inRandomOrder()->first();
        
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraph(3),
            'commenter_id' => $commenter->id,
            'commenter_type' => get_class($commenter),
            'commentable_id' => $commentable->id,
            'commentable_type' => get_class($commentable),
            'parent_id' => null,            
        ];
    }
}
