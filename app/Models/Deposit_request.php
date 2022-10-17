<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'agentId', 'depositId', 'sender', 'reciever', 'paymentway', 'paymentmethod', 'transactionId', 'ref', 'amount', 'attachment', 'dateTime', 'status', 'remarks'
    ];
}
