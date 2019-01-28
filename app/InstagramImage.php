<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstagramImage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ig_id',
        'ig_code',
        'ig_username',
        'ig_user_image_url',
        'ig_like_count',
        'ig_image_url',
    ];
}
