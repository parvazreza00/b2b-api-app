<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =[
        'BookingId', 'agentId', 'email', 'phone','name', 'pnr', 'tripType', 'pax', 'adultCount', 'childCount', 'infantCount', 'netCost', 'adultCostBase', 'childCostBase','infantCostBase', 'adultCostTax', 'childCostTax', 'infantCostTax', 'grossCost', 'baseFare', 'Tax', 'deptFrom', 'airlines', 'arriveTo', 'gds', 'status', 'dateTime', 'issueTime','timeLimit'
    ];
}
