<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
    	'farmer_no','address','particulars','amount','payment_type','votehead_id','description'
    ];
}
