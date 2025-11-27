<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postsubsubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'subsubcategory_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function subsubcategory()
    {
        return $this->belongsTo(Subsubcategory::class); // your Subsubcategory model
    }
}
