<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'pages_name', 'pages_content', 'pages_thumbnail_url',
    ];

    public $timestamps = true;
}
