<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['content'];

    /**
     * Returns the user who made the comment
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class,'made_by');
    }
}
