<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $fillable = ['user_name', 'password', 'email', 'first_name', 'last_name'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }
}
