<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupFare extends Model
{
    use HasFactory;

    protected $fillable =[
        'groupId', 'segment', 'career', 'BasePrice','Taxes', 'price', 'departure1', 'departure2', 'departure3', 'depTime1', 'depTime2', 'depTime3', 'arrival1', 'arrival2','arrival3', 'arrTime1', 'arrTime2', 'arrTime3', 'seat', 'bags', 'flightNum1', 'flightNum2', 'flightNum3', 'transit1', 'transit2'
    ];

}
