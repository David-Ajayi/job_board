<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Models\Job;
use App\Models\Category;
use App\Models\Company;


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
//Route::get('/', [JobController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', [JobController::class, 'index'])->name('home');
//    return view('jobs', [
//        'jobs' => Job::all(),
//        'categories' => Category::all()
//
//    ]);
//
//});


//binding route key to route model
//wildcard {} must match variable name eg {job} matches $job
Route::get('jobs/{job:slug}', [JobController::class, 'show']);
//Route::get('/jobs/{job:id}', function (Job $job) {
//    return view('job', [
////        'job' => Job::findOrFail($job)
//        'job' => $job
//    ]);
//
//});


Route::get('/categories/{category:name}', function (Category $category) {
    return view('jobs', [
        'jobs' => $category->jobs,
        'categories' => Category::all(),
        'currentCategory' => $category
    ]);

});
Route::get('companies/{company:name}', function (Company $company) {
//dd($company);
    return view('jobs', [
        'jobs' => $company->jobs,
         'categories' => Category::all(),
    ]);

});
