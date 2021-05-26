<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'content'
    ];
    public function post()
    {
        return $this->belongsTo(post::class, 'id_post');
    }
}
