<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
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
            'jobs' => Job::latest()->filter(request(['search', 'category', 'company']))->paginate(3)->withQueryString()


//            'categories' => Category::all()
        ]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }


// show a form to create a job

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
//        dd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('jobs', 'slug')], //slug entered has to be unique. cannot exist already
            'short_description' => 'required',
            'full_description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')], //catgeory id must exist in our db
            'company_id' => ['required', Rule::exists('companies', 'id')]

        ]);

        $attributes['user_id'] = auth()->id();

        Job::create($attributes);

        return redirect('/jobs');
    }

}
