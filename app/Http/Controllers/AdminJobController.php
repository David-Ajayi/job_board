<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Validation\Rule;

class AdminJobController extends Controller
{
    //
    public function index()
    {
        return view('admin.jobs.index', [
            'jobs' => Job::paginate(5)
//            'jobs' => Job::paginate(3)
        ]);
    }

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
            'category_id' => ['required', Rule::exists('categories', 'id')], //category id must exist in our db
//            'company_id' => ['required', Rule::exists('companies', 'id')]

        ]);
        //this will return a path to where the thumbnail was stored
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');




        $attributes['user_id'] = auth()->id();

        Job::create($attributes);

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
//        dd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'image', //thumbnail not required on update because ut was required on creation. may want to keep same image
            'slug' => ['required', Rule::unique('jobs', 'slug')->ignore($job->id)],
            //slugs must be unique so on validation when updating ignore the slug so the same slug id can be posted for update
            'short_description' => 'required',
            'full_description' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
//            'company_id' => ['required', Rule::exists('companies', 'id')]

        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $job->update($attributes);


        return back()->with('success', 'Job Updated!');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return back()->with('success', 'Job Deleted!');
    }
}
