<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
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
    
    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'created_by');
    }
}
