<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_galery extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_image',	'image_1',	'image_2',	'image_3',	'image_4',	'image_5',	'image_6',	'youtube_video'
    ];
}
