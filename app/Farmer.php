<?php

namespace App;

use App\User;
use App\Delivery;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = [
        'user_id',
        'no',
    	'name',
    	'nid',
    	'phone',
    	'locality',
    	'acno',
    	'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function delivery()
    {
        return $this->hasMany(Delivery::class);
    }
    
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
