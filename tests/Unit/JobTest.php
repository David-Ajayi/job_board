<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function job_should_map_to_user_who_created_it()
    {
        $category = Category::create(['name' => 'a testing category',
            'slug' => 'SlugForTheAges'
        ]);

       $user = User::factory()->create(['email' => 'david@test.com']);



        $job = Job::create(['title' => 'Site Supervisor',
            'category_id' => $category->id,'user_id' => $user->id, 'short_description' => 'a short description',
            'full_description' => 'full description', 'salary' => '£50,000',
            'location' => 'london', 'slug' => 'aJobSlug'
        ]);

//        dd($job);
        $this->assertEquals($job->user_id, $user->id);


    }
}
