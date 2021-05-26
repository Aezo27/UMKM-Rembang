<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone','address','maps','whatsapp','instagram', 'owner'
    ];
    public function post()
    {
        return $this->belongsTo(post::class, 'id_post');
    }
}
