<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search_history extends Model
{
    use HasFactory;

    protected $fillable = [
        'searchId', 'agentId', 'searchtype', 'DepFrom', 'ArrTo', 'class', 'searchTime', 'depTime', 'adult', 'child', 'infant', 'returnTime'
    ];
}
