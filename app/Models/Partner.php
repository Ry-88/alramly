<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Partner extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'url'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
