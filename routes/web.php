<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\JobCommentsController;


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
Route::get('/', [JobController::class, 'home']);
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/jobs', [JobController::class, 'index'])->name('index');
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



//Route::get('companies/{company:name}', function (Company $company) {
////dd($company);
//    return view('jobs.index', [
//        'jobs' => $company->jobs,
////         'categories' => Category::all(),
//    ]);
//
//});

//Route::get('/categories/{category:name}', function (Category $category) {
//    return view('jobs', [
//        'jobs' => $category->jobs,
//        'categories' => Category::all(),
//        'currentCategory' => $category
//    ]);
//
//});
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');;
//    these routes are only available if you are a guest. middleware handles that
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');;

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
//only guests should be able to login and post to that form


//only guests should be able to view the login page. If you are not a guest you should not see the login page

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

//in order to logout you have to be logged in meaning a guest should never be able to logout

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('jobs/{job:slug}/comments', [JobCommentsController::class, 'store']);


Route::get('admin/jobs/create', [JobController::class, 'create'])->middleware('admin');;
Route::post('admin/jobs', [JobController::class, 'store'])->middleware('admin');

