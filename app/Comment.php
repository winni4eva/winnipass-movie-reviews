<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = ['user_id', 'film_id', 'comment'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
