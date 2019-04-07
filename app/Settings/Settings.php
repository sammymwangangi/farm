<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
    	'from',
    	'to',
    	'price',
    ];
}
