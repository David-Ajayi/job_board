<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class JobWithUserAndCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create(['name' => 'a testing category',
            'slug' => 'SlugForTheAges'
        ]);

        $user = User::factory()->create(['email' => 'david@test.com',
            'company' => 'Acme Solutions'
        ]);

//        dd($user->company);



        Job::create(['title' => 'Site Supervisor',
            'category_id' => $category->id,'user_id' => $user->id, 'short_description' => 'a short description',
            'full_description' => 'full description', 'salary' => '£50,000',
            'location' => 'london', 'slug' => 'aJobSlug'
        ]);
    }
}
