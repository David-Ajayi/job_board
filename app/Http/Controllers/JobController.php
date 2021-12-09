<?php

namespace App\Http\Controllers;
use App\Models\Bookmark;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;

class JobController extends Controller
{
    public function home()
    {
        //dd(request(['search']));
        return view('home', [
//            'jobs' => Job::all(),
            'jobs' => Job::latest()->filter(request(['search']))->get(),
            'categories' => Category::all(),
            'user' => User::all(),
        ]);
    }
    public function index()
    {
//        dd(request(['company']));
        return view('jobs.index', [
//            'jobs' => Job::all(),
            'jobs' => Job::latest()->filter(request(['search', 'category', 'company']))->paginate(3)->withQueryString(),
//            'jobs' => Job::latest()->filter(request(['search', 'category', 'company']))->paginate(3)->withQueryString()


            'user' => User::all(),

            'bookmarks' => Bookmark::all()
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
        return view('admin.jobs.create');
    }

    public function store()
    {
//        dd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('jobs', 'slug')], //slug entered has to be unique. cannot exist already
            'short_description' => 'required',
            'full_description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')], //catgeory id must exist in our db
            'company_id' => ['required', Rule::exists('companies', 'id')]

        ]);
        //this will return a path to where the thumbnail was stored
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');




        $attributes['user_id'] = auth()->id();

        Job::create($attributes);

        return redirect('/jobs');
    }



}
