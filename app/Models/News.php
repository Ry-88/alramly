<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'content'];

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
