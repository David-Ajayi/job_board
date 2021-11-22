<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobCommentsController extends Controller
{
    //
    public function store(Job $job)
    {
        request()->validate([
            'body' => 'required'
        ]);
//         dd(request()->all());
       //  dd($job);

        //passing throught the job as $job will automattically set the job id for the comment
        $job->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body'),

        ]);

        return back();
    }

}
