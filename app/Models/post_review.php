<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_review extends Model
{
    use HasFactory;
    protected $fillable = [
        'reviewer_name',	'review_text',	'review_avatar'
    ];
}
