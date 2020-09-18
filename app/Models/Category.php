<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasSlug;
    use SoftDeletes;
    
    protected $fillable = ['name', 'description'];

    // RELATIONSHIPS

    /**
     * Returns all news
     *
     * @return void
     */
    public function news()
    {
        return $this->hasMany(News::class)->orderBy('publication_date', 'DESC');
    }

     /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
