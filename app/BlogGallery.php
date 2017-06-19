<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogGallery extends Model
{
    protected $table = 'blog_gallery';

    protected $fillable = ['images_gallery', 'blog_id'];
}
