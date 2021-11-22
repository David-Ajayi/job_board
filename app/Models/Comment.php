<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function job()
    {

        return $this-> belongsTo(Job::class);

        //relationships
        //return $this->belongsTo(Job::class, 'job_id');


    }

    public function user()
    {

        return $this-> belongsTo(User::class);

        //relationships


    }
}
