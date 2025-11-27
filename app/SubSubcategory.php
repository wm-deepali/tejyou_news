<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'name',
        'slug',
        'metatitle',
        'metadescription',
        'metakeyword',
        'status',
        'hassubsubcategory',
        'showonheader'
    ];

    /**
     * Relationship: SubSubcategory belongs to Subcategory
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Relationship: From Subcategory → Category
     * (Optional shortcut to access the category directly)
     */
    public function category()
    {
        return $this->hasOneThrough(
            Category::class,      // Final model
            Subcategory::class,   // Intermediate model
            'id',                 // Foreign key on subcategories
            'id',                 // Foreign key on categories
            'subcategory_id',     // Local key on sub_subcategories
            'category_id'         // Local key on subcategories
        );
    }
}
