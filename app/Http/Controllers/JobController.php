<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;

class JobController extends Controller
{
    public function home()
    {
        //dd(request(['search']));
        return view('home', [
//            'jobs' => Job::all(),
            'jobs' => Job::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }
    public function index()
    {
//        dd(request(['search']));
        return view('jobs.index', [
//            'jobs' => Job::all(),
            'jobs' => Job::latest()->filter(request(['search', 'category']))->get(),


//            'categories' => Category::all()
        ]);
    }

    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job
        ]);
    }

}
