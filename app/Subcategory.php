<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id', 'name', 'slug', 'metatitle', 'metadescription', 'metakeyword', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'postsubcategories', 'subcategory_id', 'post_id')
            ->where('status', 'published');

    }
}
