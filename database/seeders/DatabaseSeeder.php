<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Creator;
use App\Models\Profile;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('post_tag')->truncate();
        Tag::truncate();
        Profile::truncate();
        Comment::truncate();
        Post::truncate();
        Category::truncate();
        User::truncate();
        Admin::truncate();
        Creator::truncate();

        Schema::enableForeignKeyConstraints();
        
        $user = User::factory()->create([
            'name' => 'Supper User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);

        $creator = Creator::factory()->create([
            'name' => 'Supper Creator',
            'email' => 'creator@crator.com',
            'password' => bcrypt('password'),
        ]);

        $admin = Admin::factory()->create([
            'name' => 'Supper Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        Profile::factory()->create([
           'profileable_id' => $user->id,
           'profileable_type' => get_class($user),
        ]);

        Profile::factory()->create([
           'profileable_id' => $creator->id,
           'profileable_type' => get_class($creator),
        ]);

        Profile::factory()->create([
                'profileable_id' => $admin->id,
                'profileable_type' => get_class($admin),
        ]);
    


        // Create 10 more users with profiles
        User::factory()
            ->count(10)
            ->has(Profile::factory(), 'profile')
            ->create();

        // Create 10 more crator with profiles
        Creator::factory()
            ->count(10)
            ->has(Profile::factory(), 'profile')
            ->create();

        // Create 10 more admin with profiles
        Admin::factory()
            ->count(10)
            ->has(Profile::factory(), 'profile')
            ->create();

        Category::factory(10)->create();
        Post::factory(70)->create();
        Tag::factory(20)->create();
        

        Comment::factory(50)->create();
        
    }
}
