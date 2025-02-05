<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'designation',
        'linkedin_link',
        'fb_link',
        'order_no',
        'image',
        'details',
        'status',
    ];
}
