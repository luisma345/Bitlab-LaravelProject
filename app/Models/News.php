<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasSlug;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    // protected $table = 'news';

    protected $fillable = ['title', 'description', 'article', 'publication_date'];

    protected $dates=['publication_date'];

    // RELATIONSHIPS
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'writer');
    }


    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
