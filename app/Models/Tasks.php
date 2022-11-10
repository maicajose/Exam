<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tasks extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = ['taskName',
        'details',
        'created',
        'category',
        'owner'];
}
