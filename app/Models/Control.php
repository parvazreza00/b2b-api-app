<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    use HasFactory;

    protected $fillable = [
        'sabre','galileo', 'flyhub', 'amadeus', 'priority1', 'priority2', 'priority3'
    ];
}
