<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContenetOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_title_one',
        'button_subtitle_one',
        'button_title_two',
        'button_subtitle_two',
        'button_title_three',
        'button_subtitle_three',
        'image_one',
        'image_two',
        'image_three',
    ];
}
