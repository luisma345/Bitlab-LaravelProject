<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class readingHistory extends Model
{
    use SoftDeletes;
    /**
     * The primary key for the model.
     *
     * @var string
     */
    // protected $primaryKey = ['users_id', 'news_id'];
    // protected $primaryKey = null;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['users_id','news_id','readed_at'];


    // RELATIONSHIPS

    /**
     * Returns all news
     *
     * @return void
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
    /**
     * Returns all users
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
