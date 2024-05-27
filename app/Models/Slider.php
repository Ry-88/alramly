<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',

    ];
    protected $fillable = ['name', 'status'];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getStatusAttribute($value)
    {
        return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
    }
}
