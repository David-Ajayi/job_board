<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('full_description', 'like', '%' . $search . '%'));
    }

    public function category()
    {

        return $this-> belongsTo(Category::class);

        //relationships


    }

    public function company()
    {

        return $this-> belongsTo(Company::class);




    }


}
