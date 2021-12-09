<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Comment;

use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\JobWithUserAndCategorySeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class CommentTest extends TestCase
{
    use RefreshDatabase;



    /** @test */
    public function comment_should_belong_to_a_job()
    {
        $comment = Comment::factory()->create();

        $job = Job::first();
//        $user = User::first();
//
        $this->assertEquals($comment->job_id, $job->id);
//
//        $job->title = 'Maths Teacher';
//
//        $this->assertEquals('Maths Teacher', $job->title);


    }


    /** @test */
    public function comments_posted_should_match_job_posted_to()
    {
        $comment = Comment::factory()->create();


        $firstJob = Job::factory()->create(['id'=> 10]);

        $comment->job_id =  $firstJob->id;
        $secondJob = Job::factory()->create();
//
//

//
        $this->assertDatabaseCount('jobs', 3); //a job is creted when a comment is created so total should be 3
        $this->assertEquals(10, $comment->job_id);
//



    }



    /** @test */
    public function comment_count()
    {
       // $comment = Comment::factory()->create();
        $user = User::factory()->create();


        $job = Job::factory()->create();






//
//        $this->assertEquals('Maths Teacher', $job->title);

        $job->comments()->create([
            'user_id' =>  $user->id,
            'body' => 'blah',

        ]);

        $job->comments()->create([
            'user_id' => $user->id,
            'body' => 'blah',

        ]);

        //get the count for any particular job

//        dd($job->commentCount());

        $this->assertEquals(2, $job->commentCount());


    }


}
