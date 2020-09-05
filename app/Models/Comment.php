<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
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
