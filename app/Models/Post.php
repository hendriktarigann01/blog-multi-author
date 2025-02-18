<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_title',
        'post_category_id',
        'post_description',
        'post_image',
        'post_users_id',
        'post_views',
        'post_image_url', 
        'post_image_public_id', 
    ];
}
