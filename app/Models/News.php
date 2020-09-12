<?php

namespace App\Models;

use App\models\readingHistory;
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

    /**
     * Returns all comments
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * Returns the category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Returns the writer
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'writer');
    }

    /**
     * Returns the Reading Histories with likes
     *
     * @return void
     */
    public function readingHistories()
    {
        return $this->hasMany(readingHistory::class)->where('liked',true);
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
