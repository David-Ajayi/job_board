<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),
        'categories' => Category::all()

    ]);

});


//binding route key to route model
//wildcard {} must match variable name eg {job} matches $job
Route::get('/jobs/{job:id}', function (Job $job) {
    return view('job', [
//        'job' => Job::findOrFail($job)
        'job' => $job
    ]);

});


Route::get('/categories/{category:name}', function (Category $category) {
    return view('jobs', [
        'jobs' => $category->jobs,
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);

});
