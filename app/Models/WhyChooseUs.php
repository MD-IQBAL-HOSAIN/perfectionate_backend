<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WhyChooseUs extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'image',
        'body_title',
        'description',
        'status',
    ];

    public array $translatable = [
        'name',
        'title',
        'subtitle',
        'image',
        'body_title',
        'description',
    ];

    public function getImageAttribute($value): string | null
    {
        if (request()->is('api/*') && !empty($value)) {
            return url($value);
        }
        return $value;
    }

}
