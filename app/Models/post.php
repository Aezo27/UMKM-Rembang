<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',	'slug'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    public function post_reviews()
    {
        return $this->hasMany(post_review::class, 'id_post');
    }
    public function post_details()
    {
        return $this->hasOne(post_detail::class, 'id_post');
    }
    public function post_galeries()
    {
        return $this->hasOne(post_galery::class, 'id_post');
    }
    public function post_contacts()
    {
        return $this->hasOne(post_contact::class, 'id_post');
    }
    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }
}
