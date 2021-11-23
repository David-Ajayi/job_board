<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];
//    protected $with = ['category', 'user'];
//Jobs:: newQuery()-> filter  build up a query and the call what is after scope. In this case Filter
//    public function scopeFilter($query, array $filters)
//    {
////        $query->when($filters['search'] ?? false, function ($query, $search) {
////            $query
////                ->where('title', 'like', '%' . $search . '%')
////                ->orWhere('short_description', 'like', '%' . $search . '%');
////
////
////        });
//
//        $query->when($filters['search'] ?? false, fn($query, $search) =>
//    $query
//        ->where('title', 'like', '%' . $search . '%')
//        ->orWhere('short_description', 'like', '%' . $search . '%'));
//
//        $query->when($filters['category'] ?? false, fn($query, $category) =>
//        $query->whereHas('category', fn ($query) =>
//        $query->where('slug', $category)
//        )
//        );
//
//    }


    public function scopeFilter($query, array $filters)
    {
//        $query->when($filters['search'] ?? false, fn($query, $search) =>
//        $query
//            ->where('title', 'like', '%' . $search . '%') HAS A SMALL BUG WHERE QUERY RETURN MULTIPLE CATEGORIES WHEN SHOULD ONLY RETURN ONE
//            ->orWhere('full_description', 'like', '%' . $search . '%'));

        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('full_description', 'like', '%' . $search . '%')
        )
        );


        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('slug', $category)
        )
        );


        $query->when($filters['company'] ?? false, fn($query, $user) =>
        $query->whereHas('user', fn ($query) =>
        //above is calling the method user on jobs
        $query->where('company', $user)
        )
        );

        //give me the jobs that have a company that match the $company name passed through
    }

    public function comments()
    {

        return $this-> hasMany(Comment::class);

        //relationships


    }

    public function category()
    {

        return $this-> belongsTo(Category::class);

        //relationships


    }

//    public function company()
//    {
//
//        return $this-> belongsTo(Company::class);
//
//
//
//
//    }
    public function user()
    {

        return $this-> belongsTo(User::class);




    }


}
