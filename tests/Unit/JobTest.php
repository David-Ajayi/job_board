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
use Illuminate\Support\Facades\DB;

class JobTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(JobWithUserAndCategorySeeder::class);

    }


    /** @test */
    public function job_should_map_to_user_who_created_it()
    {
        $job = Job::first();
        $user = User::first();

        $this->assertEquals($job->user_id, $user->id);

        $job->title = 'Maths Teacher';

        $this->assertEquals('Maths Teacher',$job->title );


    }

    /** @test */
    public function job_should_be_created_and_add_to_db()
    {
        $category = Category::first();
        $user = User::first();

        Job::create(['title' => 'Site Supervisor',
            'category_id' => $category->id ,'user_id' => $user->id, 'short_description' => 'a short description',
            'full_description' => 'full description', 'salary' => '£50,000',
            'location' => 'london', 'slug' => 'atestslug'
        ]);


//        $job = Job::latest()->first();
        $job = DB::table('jobs')->orderBy('id', 'DESC')->first();




        $this->assertDatabaseCount('jobs', 2);

        $this->assertEquals('atestslug',$job->slug );


    }

    


}
