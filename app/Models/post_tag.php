<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Conner\Tagging\Taggable;

class post_tag extends Model
{
    protected $table = 'post_tag';
    use HasFactory;
    protected $fillable = [
        'tag_name'
    ];
}
