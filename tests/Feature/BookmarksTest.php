<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Comment;
use App\Models\Bookmark;

use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\JobWithUserAndCategorySeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

class BookmarksTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function user_can_bookmark_a_job()
    {
      $job = Job::factory()->create();
      $user = User::factory()->create();
      $this->actingAs($user);
      $job->bookmarks()->create([
          'user_id' => $user->id,
          'job_id' => $job->id

      ]);;

      $this->assertDatabaseHas('bookmarks', ['user_id' => $user->id, 'job_id' => $job->id]);

    }

    /** @test */
    public function see_status_of_bookmark()
    {
        $job = Job::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);
        $job->bookmarks()->create([
            'user_id' => $user->id,
            'job_id' => $job->id

        ]);

//        $job->setBookmark();


        $this->assertTrue($job->isBookmarked());

        $job->removeBookmark();
//        dd($job->isBookmarked());

        $this->assertFalse($job->isBookmarked());


    }

    /** @test */
    public function user_can_toggle_bookmark_status()
    {
        $job = Job::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

//             dd($job->isBookmarked()->count());

        $job->toggle();

        $this->assertTrue($job->isBookmarked());

        $job->toggle();

        $this->assertFalse($job->isBookmarked());


      }

//    /** @test */
//    public function isBookmarked_return_all_job_bookmarked_by_user()
//    {
//        $job = Job::factory()->create();
//        $user = User::factory()->create();
//        $this->actingAs($user);
//        $job->setBookmark();
//        $job2 = Job::factory()->create();
//        $job2->setBookmark();
//        $job3 = Job::factory()->create();
//        $job3->setBookmark();
//
//        // I want a collection of all the jobs this user has bookmarked
//
//
//
//
//
//        $this->assertEquals($job->isBookmarked()[0], 1);
//
//
//
//    }








}
