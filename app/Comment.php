<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id',
    	'title',
    	'body',
    	'audio',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
