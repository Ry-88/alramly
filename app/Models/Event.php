<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description'];

    protected $fillable = [
        'title', 'slug', 'description', 'date', 'time'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
