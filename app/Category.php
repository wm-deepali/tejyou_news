<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','metatitle','metadescription','metakeyword','hassubcategory','showonheader','showonleftside','showonfooter','status','image', 'show_in_menu'];

    public function posts()
    {
        return $this->belongsToMany('App\Post','postcategories')->where('status','published');
    }

    public function videoposts()
    {
        return $this->belongsToMany('App\Post','postcategories','category_id','post_id')->where('status','published')->whereNotNull('video')->orderBy('id','DESC')->take(12);
    }

    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
}
