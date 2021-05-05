<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting_contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_1',	'text_2',	'phone',	'address',	'maps',	'whatsapp',	'instagram',	'email'
    ];
}
