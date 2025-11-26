<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'user_id',
        'postnumber',
        'title',
        'slug',
        'content',
        'video',
        'image',
        'imagetag',
        'metatitle',
        'metadescription',
        'metakeyword',
        'views',
        'approvedby_id',
        'status',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function approvedby()
    {
        return $this->belongsTo('App\User','approvedby_id');
    }

    public function categories()
    {
        return $this->hasMany('App\Postcategory');
    }

    public function getCategoryIds()
    {
        return $this->categories()->pluck('category_id')->toArray();
    }

    public function subcategories()
    {
        return $this->hasMany('App\Postsubcategory');
    }

    public function tags()
    {
        return $this->hasMany('App\Posttag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment')->whereNull('parent_id')->where('status','active');
    }
    
    public function category()
    {
        return $this->hasOneThrough(Category::class, PostCategory::class, 'post_id', 'id', 'id', 'category_id');
    }
}
