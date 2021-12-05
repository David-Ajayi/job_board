<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Job;
use App\Models\Comment;
use App\Models\Bookmark;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//Company::truncate();
//Job::truncate();
//Category::truncate();
//
//        $company =  Company::factory()->create([
//           'name' => 'Acme Solutions'
//
//        ]);

                $user =  User::factory()->create([
           'company' => 'Acme Solutions'

        ]);


        Job::factory(5)->create([

                'user_id' => $user->id
//                 overidding the company id in the factory with the company created above 'acme'


        ]);



        Comment::factory()->create([
            'user_id' => $user->id,
            'job_id' => 1

        ]);

        Bookmark::factory()->create([
            'user_id' => $user->id,
            'job_id' => 1

        ]);



    }
}



//
//
//        $company = Company::create([
//            'name' => 'Acme Solutions',
//            'email'=> 'acme@email.com',
//            'password' => bcrypt('password')
//
//
//        ]);
//
//        $technology = Category::create([
//            'name' => 'Technology',
//            'slug'=> 'technology',
//
//
//        ]);
//
//
//
//        $admin =  Category::create([
//            'name' => 'Admin',
//            'slug'=> 'admin',
//
//
//        ]);
//
//        $finance = Category::create([
//            'name' => 'Finance',
//            'slug'=> 'finance',
//
//
//        ]);
//
//        $driving = Category::create([
//            'name' => 'Driving',
//            'slug'=> 'driving',
//
//
//        ]);
//
//        Job::create([
//            'company_id'=> $company->id,
//            'category_id' => $technology->id,
//            'title' => 'Junior software engineer',
//            'slug' => 'Junior-software-engineer',
//            'salary'=>'30,000',
//            'location' => 'London',
//            'short_description' => 'this is a very short description that should only show on the card on the page where the jobs are listed as a preview',
//            'full_description' => 'this is the long description that will show on the page where the actual job listing exists. It should be much more lengthy and inlcude all details about the job listing. extensively',
//
//
//        ]);
//
//        Job::create([
//            'company_id'=> $company->id,
//            'category_id' => $admin->id,
//            'title' => 'Junior Accountant',
//            'slug' => 'junior-accountant',
//            'salary'=>'30,000',
//            'location' => 'London',
//            'short_description' => 'this is a very short description that should only show on the card on the page where the jobs are listed as a preview',
//            'full_description' => 'this is the long description that will show on the page where the actual job listing exists. It should be much more lengthy and inlcude all details about the job listing. extensively',
//
//
//        ]);
//
//
//        Job::create([
//            'company_id'=> $company->id,
//            'category_id' => $driving->id,
//            'title' => 'Delivery driver',
//            'slug' => 'delivery-driver',
//            'salary'=>'30,000',
//            'location' => 'London',
//            'short_description' => 'this is a very short description that should only show on the card on the page where the jobs are listed as a preview',
//            'full_description' => 'this is the long description that will show on the page where the actual job listing exists. It should be much more lengthy and inlcude all details about the job listing. extensively',
//
//
//        ]);



