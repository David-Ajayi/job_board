<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'slug' => $this->faker->slug(),
            'location' => $this->faker->city(),
            'salary' => '£30,000',
            'short_description' => $this->faker->sentence(),
            'full_description' => $this->faker->paragraph(),

            //
        ];
    }
}
