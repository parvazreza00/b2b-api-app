<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    protected $fillable = [
        'agentId', 'name', 'email', 'password', 'phone', 'photo', 'joinAt', 'status', 'company', 'companyadd', 'companyImage', 'logo', 'logoPermission', 'markup'
    ];
}
