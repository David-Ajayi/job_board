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
        return view('jobs', [
//            'jobs' => Job::all()->filter(request(['search']))->get(),
            'jobs' => Job::all()->filter->get(),
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
