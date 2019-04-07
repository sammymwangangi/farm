<?php

namespace App;

use App\Farmer;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable=[
    	'farmer_no', // 50
    	'litres',// 50ml
    	'deliverer', // Jack
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_no');
    }
}
