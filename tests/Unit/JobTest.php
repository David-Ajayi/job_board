<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\JobWithUserAndCategorySeeder;
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
   $this->seed(JobWithUserAndCategorySeeder::class);
        $job = Job::first();
        $user = User::first();

        $this->assertEquals($job->user_id, $user->id);


    }
}
