<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setting_home extends Model
{
    use HasFactory;
    protected $fillable = [
        'text_1',	'text_2',	'text_3',	'text_4',	'slide_1',	'slide_2',	'slide_3'
    ];
}
