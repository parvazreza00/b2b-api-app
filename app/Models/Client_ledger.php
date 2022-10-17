<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client_ledger extends Model
{
    use HasFactory;

    protected $fillable = [
        'agentId', 'deposit', 'purchase', 'lastAmount', 'transactionId', 'details', 'reference', 'dateTime'
    ];
}
