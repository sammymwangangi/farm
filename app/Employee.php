<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =
    [
        'user_id',
        'nid',
        'name',
        'phone',
        'email',
        'payroll_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
