<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body','image','status'];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getStatusAttribute($value)
    {
        return $value == 'enabled' ? 'مفعل' : 'غير مفعل';
    }
}
