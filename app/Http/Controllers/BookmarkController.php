<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Comment;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    //

    public function show()
    {
//        show all jobs bookmarked by this user
        return view('users.bookmarks', [
//            'bookmarks' => Bookmark::all()
            'bookmarks' => Bookmark::where('user_id', request()->user()->id)->get()



        ]);




    }




    public function store(Job $job)
    {
        $user_id = request()->user()->id;

//        dd(request()->input());



        $updates = request()->all();

//        dd($updates['bookmark']);
//        create and save the job_id and the user_id to the bookmarks Table
//        if($updates['bookmark'] == '1')  {
//            $job->bookmark()->create([
//                'user_id' => request()->user()->id
//            ]);
//    }else{
//            $job->bookmark()->delete();
//
//        }

        if (Bookmark::where('user_id', $user_id)
        -> where('job_id', $job->id)
            ->delete()) {
//            $job->bookmark->where('user_id', request()->user()->id)->delete();
            return redirect('/jobs')->with('success', 'Your bookmark has been removed' );

        }else{
            $job->bookmarks()->create([
               'user_id' => $user_id


           ]);
            return redirect('/jobs')->with('success', 'Your bookmark has been added' );
        }












    }



    public function delete(Bookmark $bookmark)
    {


        Bookmark::where('id', $bookmark->id)->delete();




        return back()->with('success', 'Your bookmark has been deleted' );







    }












    }








