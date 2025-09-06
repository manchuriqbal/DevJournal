<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use App\Models\Creator;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Profile::class;
    public function definition(): array
    {
        $profileableClasses = [ User::class, Creator::class, Admin::class];
        $profileableClass = $this->faker->randomElement($profileableClasses);
        $profileable = $profileableClass::inRandomOrder()->first();
        return [
            'profileable_id' => $profileable->id,
            'profileable_type' => get_class($profileable),
            'avatar' => "https://i.pravatar.cc/300?img=" .$this->faker->numberBetween(1, 70),
            'job_title' => $this->faker->jobTitle(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->randomElement(['male','female']),
            'bio' => $this->faker->sentence(10),
            'dob' => $this->faker->dateTimeBetween('1982-01-01', '2008-12-31')->format('Y-m-d'),
            'social_links' => [
                'facebook' => $this->faker->url(),
                'twitter' => $this->faker->url(),
            ]
        ];
    }
}
