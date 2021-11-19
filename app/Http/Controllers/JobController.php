<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
//        dd(request(['search']));
        return view('jobs', [
//            'jobs' => Job::all(),
            'jobs' => Job::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Job $job)
    {
        return view('job', [
            'job' => $job
        ]);
    }

}
