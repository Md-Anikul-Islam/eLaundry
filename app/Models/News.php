<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_bn',
        'date',
        'image',
        'link',
        'details',
        'details_bn',
        'status',
    ];
}
