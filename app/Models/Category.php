<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // RELATIONSHIPS

    /**
     * Returns all news
     *
     * @return void
     */
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
