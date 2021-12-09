<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];


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


        $query->when($filters['company'] ?? false, fn($query, $company) =>
        $query->whereHas('user', fn ($query) =>
        //above is calling the method user on jobs
        $query->where('company', $company)
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


    public function user()
    {

        return $this-> belongsTo(User::class);




    }

    public function bookmark()
    {

        return $this-> hasMany(Bookmark::class);

    }

    public function commentCount(){

        return $this->comments()->count();
    }


    public function setBookmark()
   {
       $bookmark = new Bookmark(['user_id' => Auth::id()]);
       $this->bookmark()->save($bookmark);

   }


    public function isBookmarked()
    {
        return !! $this->bookmark()->where('user_id', Auth::id())->count();
        //return boolean from this

    }




    public function removeBookmark()
    {

        $this->bookmark()->where('user_id', Auth::id())->delete();


    }

    public function toggle()
    {
        if($this->isBookmarked())
        {
            return $this->removeBookmark();
        }else {

            return $this->setBookmark();
        }


    }



}
