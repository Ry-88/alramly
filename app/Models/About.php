<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['content'];

    protected $fillable = [
        'content',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
