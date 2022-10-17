<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoiceId', 'agentId', 'BookingId', 'stuffId', 'route', 'cost', 'type', 'airlines', 'issueTime', 'status'
    ];
}
