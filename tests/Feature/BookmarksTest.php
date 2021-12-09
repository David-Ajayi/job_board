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

class BookmarksTestTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function user_can_bookmark_a_job()
    {
      $job = Job::factory()->create();
      $user = User::factory()->create();
      $this->actingAs($user);
      $job->bookmark()->create([
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
        $job->bookmark()->create([
            'user_id' => $user->id,
            'job_id' => $job->id

        ]);

        $job->setBookmark();

//        dd($job->isBookmarked());
        $this->assertTrue($job->isBookmarked());

        $job->removeBookmark();

        $this->assertFalse($job->isBookmarked());


    }

    /** @test */
    public function user_can_toggle_bookmark_status()
    {
        $job = Job::factory()->create();
        $user = User::factory()->create();
        $this->actingAs($user);

//             dd($job->isBookmarked());

        $job->toggle();

        $this->assertTrue($job->isBookmarked());

        $job->toggle();

        $this->assertFalse($job->isBookmarked());


      }








}
